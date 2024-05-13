<?php

namespace App\Http\Controllers;

use App\Http\Transformers\SubjectTransformer;
use App\Models\Subject;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function index()
    {
        return redirect()->route('index');
    }

    public function show(Subject $subject)
    {
        if($subject->published_at === null) {
            abort(403, 'unauthorized.');
        }
        $subjectData = fractal($subject, new SubjectTransformer())->toArray();
        // $subject->view = $subject->view + 1;
        // $subject->save();
        $userIp = (string)request()->ip();
        $transformUserIP = str_replace('.', '_', $userIp);
        if(!$this->checkSessionByIp($transformUserIP, $subject->id)){
            $subject->increment('view');
        }
        Session::put($transformUserIP, $subject->id);
        return Inertia::render('Subject/Show')->with([
            'subject' => $subjectData
        ]);
    }

    private function checkSessionByIp($transformUserIP, $subjectId)
    {
        if(Session::get($transformUserIP) === $subjectId){
            return true;
        }
        return false;
    }


}
