<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\UserTest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function historyTest(Request $request, UserTest $userTest)
    {
        $list = $userTest->getByUserId($request->user()->id);
        return view('user.history')->with([
            'list'=>$list
        ]);
    }
}
