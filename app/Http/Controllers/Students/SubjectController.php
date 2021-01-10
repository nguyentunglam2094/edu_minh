<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ExerciseType;
use App\Models\Exersires;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function detailSubject(ExerciseType $exerciseType, Exersires $exersires, $subject_id)
    {
        $detailType = $exerciseType->detail($subject_id);
        if(empty($detailType)){
            return back();
        }
        $listEx = $exersires->getExersires($subject_id);
        $listSubject = $exerciseType->getList($detailType);
        return view('subject.index')->with([
            'detail'=> $detailType,
            'listEx'=> $listEx,
            'listSubject'=> $listSubject,
        ]);
    }
}