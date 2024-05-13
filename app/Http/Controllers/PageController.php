<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUserAction;
use App\Http\Transformers\SubjectTransformer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only('search');
        $subjects = Subject::with('professors')
            ->filter($filters)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(5);
        $subjectsData = fractal($subjects,new SubjectTransformer())->toArray();
        return Inertia::render('Index')->with([
            'subjects' => $subjectsData
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        return Inertia::render('Dashboard/Index')->with([
            'user' => $user,
            'number' => 9,
            'date' => "9-3-2567",
        ]);
    }

    public function userRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function storeRegister(Request $request, RegisterUserAction $userAction)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ]);
        $newUser = $userAction->execute(new User(), $request->all());
        Auth::login($newUser);
        return redirect()->route('index');
    }

//    public function login()
//    {
//        return Inertia::render('Auth/Login');
//    }
//
//    public function doLogin(Request $request)
//    {
//        $request->only('email', 'password');
//        $user = User::where('email', $request->email)->first();
//        dd($request->all());
//    }
}
