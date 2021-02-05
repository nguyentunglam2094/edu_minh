<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\ExerciseType;
use App\Models\Exersires;
use App\Models\Teachers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     *  view home page
     */
    public function index(Teachers $teachers, ExerciseType $exerciseType, Banners $banners)
    {
        $listTeacher = $teachers->getTeachers();
        $listEx = $exerciseType->getTypeEx();
        $listBanner = $banners->orderBy('id','desc')->get();

        return view('dashboard.dashboard')->with([
            'teachers'=>$listTeacher,
            'listEx'=>$listEx,
            'listBanner'=>$listBanner
        ]);
    }

    public function searchCode(Request $request, Exersires $exersires)
    {
        $listEx = $exersires->searchCodeExer($request->search);
        return view('search.index')->with([
            'listEx'=>$listEx,
        ]);
    }
}
