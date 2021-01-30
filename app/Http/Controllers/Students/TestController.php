<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Tests;
use App\Models\UserAnswer;
use App\Models\UserTest;
use Exception;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function indexTest(Subject $subject, Tests $tests, $slug)
    {
        $detail = $subject->getDetailBySlug($slug);
        $testList = $tests->getBySubjectId($detail->id);
        return view('test_online.index')->with([
            'tests'=>$testList
        ]);
    }

    public function detail(Tests $test, $id)
    {
        $detail = $test->getDetailTest($id);
        return view('test_online.detail')->with([
            'detail'=>$detail
        ]);
    }

    public function resultTest(Request $request, UserTest $userTest, Tests $test, $id)
    {
        $result = $userTest->detailTestUser($id);
        $detail = $test->getDetailTest($result->test_id);
        return view('test_online.result_test')->with([
            'detail'=>$detail,
            'result'=>$result
        ]);
    }

    public function endTest(Request $request, UserTest $userTest)
    {
        $request->validate([
            'test_id'=>'required|exists:tests,id'
        ]);
        try{
            $result = $userTest->confirmTest($request);
            return redirect()->route('result.test', $result->id);
        }catch(Exception $e){
            return back()
            ->with(['alert-type' => 'error', 'message' => 'Nộp bài thi thất bại']);
        }
    }
}
