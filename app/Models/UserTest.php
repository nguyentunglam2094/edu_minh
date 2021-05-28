<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    //
    protected $table = 'user_test';
    protected $fillable = ['id', 'user_id', 'test_id', 'answer_corredt', 'result', 'times', 'date'];

    public function userAnser()
    {
        return $this->hasMany(UserAnswer::class, 'user_test_id', 'id');
    }
    public function testAnswer()
    {
        return $this->hasMany(TestAnswers::class, 'test_id', 'test_id');
    }

    public function test()
    {
        return $this->hasOne(Tests::class, 'id' ,'test_id');
    }

    public function getByUserId($user_id)
    {
        return $this->with('test')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
    }

    public function confirmTest($request)
    {
        //vào test answer lấy ra danh sách đáp án
        $test = new Tests();
        $userAn = new UserAnswer();
        $detailTest = $test->getDetailTest($request->test_id);

        $user_id = $request->user()->id;
        $test_id = $request->test_id;

        $check = $this->where('user_id', $user_id)->where('test_id', $test_id)->first();
        if(!empty($check)){
            $user_test_id = $check->id;
            $userAn->where('user_test_id', $user_test_id)->delete();
        }else{
            $data = [
                'user_id'=>$user_id,
                'test_id'=>$test_id,
                'answer_corredt'=>0,
                'result'=>0,
                'date'=>Carbon::now('Asia/Ho_Chi_Minh')
            ];
            $createTest = $this->create($data);
            $user_test_id = $createTest->id;
        }

        $userAnswer = [];
        $answer_corredt = 0;
        foreach($detailTest->answers as $val){
            $select = !empty($request->answer[$val->question_number]) ? $request->answer[$val->question_number] : 0;
            if($select == $val->selected_question){
                $answer_corredt++;
            }
            $userAnswer[] = [
                'user_test_id'=>$user_test_id,
                'question_number'=>$val->question_number,
                'answer'=>$select,
            ];
        }
        //tổng số câu đúng -> tổng số câu
        // 1 điểm -> 10 điểm
        if(!empty($userAnswer)){
            $userAn->insert($userAnswer);
            $this->where($this->primaryKey, $user_test_id)->update([
                'answer_corredt'=>$answer_corredt
            ]);
        }
        return $this->detailTestUser($user_test_id);
    }

    public function detailTestUser($id)
    {
        return $this->with(['userAnser'])->where($this->primaryKey, $id)->first();
    }


}
