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
        $detailSubject = $exerciseType->detail($subject_id);
        $listEx = $exersires->getExersires($subject_id);
        return view('subject.index')->with([
            'detail'=> $detailSubject,
            'listEx'=> $listEx,
        ]);
    }
}
