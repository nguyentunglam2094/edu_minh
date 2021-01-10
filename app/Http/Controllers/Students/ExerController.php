<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Exersires;
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

    public function loadCommentEx(Request $request, Comments $comments)
    {
        if($request->ajax()){
            if(!empty($request->newCmt)){
                $comments->saveComment($request);
            }
            //get comment
            $list = $comments->getCommentByExer($request->ex_id);
            return view('exersire.comments')->with([
                'listComment'=>$list
            ]);
        }
    }
}
