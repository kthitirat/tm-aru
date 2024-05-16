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

    //public function show(Subject $subject)
    public function show(string $subject)
    {
        $subject = Subject::where('uuid', $subject)->first();
        if($subject->published_at === null) {
            abort(403, 'unauthorized.');
        }
        //$subjectData = fractal($subject, new SubjectTransformer())->toArray(); ย้ายลงไปข้างล่าง
        // $subject->view = $subject->view + 1;
        // $subject->save();
        $userIp = (string)request()->ip();
        $transformUserIP = str_replace('.', '_', $userIp);
        if(!$this->checkSessionByIp($transformUserIP, $subject->id)){
            $subject->increment('view');
        }
        Session::put($transformUserIP, $subject->id);
        $subject->fresh();
        $subjectData = fractal($subject, new SubjectTransformer())->includeImage()->includeDocuments()->toArray();
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
