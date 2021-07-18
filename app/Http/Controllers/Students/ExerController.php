<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Libraries\Ultilities;
use App\Models\Comments;
use App\Models\Exersires;
use App\Models\PushNotifications;
use App\Models\Teachers;
use Illuminate\Http\Request;

class ExerController extends Controller
{
    //
    public function detailExer(Exersires $exersires, $id)
    {
        $detailExer = $exersires->getDetail($id);
        if(empty($detailExer)){
            return back();
        }
        $listSame = $exersires->listExerSame($detailExer);
        return view('exersire.index')->with([
            'detail'=>$detailExer,
            'listSame'=>$listSame
        ]);
    }

    public function loadCommentEx(Request $request, Comments $comments, Exersires $exersires)
    {
        if($request->ajax()){
            if(!empty($request->newCmt)){
                $comments->saveComment($request);
                $list = $comments->getCommentByExer($request->ex_id);

                //notification
                //get admin
                $teacherArr = Teachers::get()->pluck('id')->toArray();
                Ultilities::pushNotifyToUsers($request->user()->id,  $teacherArr, 'Bình luận bài tập mới', $request->user()->name . ' đã bình luận một bài tập',
                PushNotifications::TYPE_GROUP, PushNotifications::SOURCE_STUDENT, PushNotifications::SOURCE_ADMIN, 'detailexersire', $request->ex_id);

                return view('exersire.comments')->with([
                    'listComment'=>$list
                ]);
            }
            //get comment
            if(!empty($request->type)){
                $detailEx = $exersires->getDetailByCode($request->ex_id);
            }else{
                $detailEx = $exersires->getDetailById($request->ex_id);
            }

            $count = !empty($detailEx) ? $comments->countComment($detailEx->id) : null;
            $list = !empty($detailEx) ? $comments->getCommentByExer($detailEx->id) : null;

            return view('exersire.detail')->with([
                'listComment'=>$list,
                'detail'=>$detailEx,
                'count'=>$count,
            ]);
        }
    }
}
