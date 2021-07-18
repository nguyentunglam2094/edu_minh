<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Libraries\Ultilities;
use App\Models\Banners;
use App\Models\ExerciseType;
use App\Models\Exersires;
use App\Models\PushNotifications;
use App\Models\Teachers;
use App\Models\Themes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     *  view home page
     */
    public function index(Teachers $teachers, Banners $banners, Themes $themes, Exersires $exersires)
    {
        $listTeacher = $teachers->getTeachers();
        $listEx = $exersires->getExersires();
        $listBanner = $banners->orderBy('id','desc')->get();

        return view('dashboard.dashboard')->with([
            'teachers'=>$listTeacher,
            'listEx'=>$listEx,
            'listBanner'=>$listBanner
        ]);
    }

    public function detailTeacher(Request $request, Teachers $teachers, $id)
    {
        $detail = $teachers->detail($id);
        $otherTeachers = $teachers->where('id', '<>', $id)->get();
        return view('teachers.index')->with([
            'detail'=>$detail,
            'otherTeachers'=>$otherTeachers
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
