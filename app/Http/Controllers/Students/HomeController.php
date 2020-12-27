<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     *  view home page
     */
    public function index(Teachers $teachers)
    {
        $listTeacher = $teachers->getTeachers();
        return view('dashboard.dashboard')->with([
            'teachers'=>$listTeacher
        ]);
    }

}
