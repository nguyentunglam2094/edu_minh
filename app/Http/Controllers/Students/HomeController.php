<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ExerciseType;
use App\Models\Teachers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     *  view home page
     */
    public function index(Teachers $teachers, ExerciseType $exerciseType)
    {
        $listTeacher = $teachers->getTeachers();
        $listEx = $exerciseType->getTypeEx();
        return view('dashboard.dashboard')->with([
            'teachers'=>$listTeacher,
            'listEx'=>$listEx,
        ]);
    }

}
