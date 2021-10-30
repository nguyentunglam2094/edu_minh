<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Libraries\Ultilities;
use App\Models\Classes;
use App\Models\Comments;
use App\Models\PushNotifications;
use App\Models\Subject;
use App\Models\Teachers;
use App\Models\Tests;
use App\Models\TestType;
use App\Models\UserAnswer;
use App\Models\UserTest;
use Exception;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function indexTest(Subject $subject, Tests $tests, Classes $classes, $slug)
    {
        $detail = $subject->getDetailBySlug($slug);
        if(empty($detail)){
            return back();
        }
        $testList = $tests->getBySubjectId($detail->id);
        //get all class
        $listClass = $classes->with('testType')->get();
        $title = "Tất cả đề thi môn " .$detail->title;
        return view('test_online.index_type')->with([
        // return view('test_online.index')->with([
            'tests'=>$testList,
            'listClass'=>$listClass,
            'detail'=>$detail,
            'title'=>$title,
        ]);
    }

    public function typeTest(Subject $subject, Tests $tests, Classes $classes, $id, $slug)
    {
        $detail = $subject->getDetailBySlug($slug);
        $typeTest = TestType::where('id', $id)->first();
        if(empty($detail) || empty($typeTest)){
            return back();
        }
        $listClass = $classes->with('testType')->get();
        $testList = $tests->getBySubjectId($detail->id, $id);

        $title = $typeTest->title .' môn ' .$detail->title;

        return view('test_online.index_type')->with([
        // return view('test_online.index')->with([
            'tests'=>$testList,
            'listClass'=>$listClass,
            'detail'=>$detail,
            'title'=>$title,
        ]);
    }

    // public function indexTest(Subject $subject, Tests $tests, $slug)
    // {
    //     $detail = $subject->getDetailBySlug($slug);
    //     $testList = $tests->getBySubjectId($detail->id);
    //     return view('test_online.index')->with([
    //         'tests'=>$testList
    //     ]);
    // }

    public function detail(Tests $test, $id)
    {
        $detail = $test->getDetailTest($id);
        return view('test_online.detail')->with([
            'detail'=>$detail
        ]);
    }

    public function resultTest(UserTest $userTest, Tests $test, $id)
    {
        $result = $userTest->detailTestUser($id);
        $detail = $test->getDetailTest($result->test_id);
        //tính điểm
        //số câu đúng ------ tổng số câu
        // ? điểm     ------ 10 điểm
        $count = (10 * $result->answer_corredt) / $detail->question_number;
        $count = round($count, 2);

        return view('test_online.result_test')->with([
            'detail'=>$detail,
            'result'=>$result,
            'count'=>$count,
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



    public function loadCommentTest(Request $request, Comments $comments)
    {
        if($request->ajax()){
            if(!empty($request->newCmt)){
                $comments->saveComment($request, 1);
                $teacherArr = Teachers::get()->pluck('id')->toArray();
                Ultilities::pushNotifyToUsers($request->user()->id,  $teacherArr, 'Bình luận bài thi mới', $request->user()->name . ' đã bình luận một bài thi',
                PushNotifications::TYPE_GROUP, PushNotifications::SOURCE_STUDENT, PushNotifications::SOURCE_ADMIN, 'detailtest', $request->ex_id);
            }
            //get comment
            $list = $comments->getCommentByTest($request->ex_id);
            return view('exersire.comments')->with([
                'listComment'=>$list
            ]);
        }
    }
}
