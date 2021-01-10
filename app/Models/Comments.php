<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['user_id','object_id', 'exercise_id', 'comment', 'parent_id'];

    public function parentComment()
    {
        return $this->hasMany(Comments::class, 'parent_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }
    /**
     * lấy danh sách comment theo id bài viết
     * @author lamtn
     */
    public function getCommentByExer($exer_id)
    {
        return $this->with(['parentComment.user', 'user'])->where('exercise_id', $exer_id)
        ->orderBy('id','desc')->get();
    }

    /**
     * save new comment
     * type == 0 là lưu bài viết
     * type == 1 là lưu test onlinet
     */
    public function saveComment($request, $type = 0)
    {
        $parent_id = 0;
        if(!empty($request->parent_id)){
            $parent_id = $request->parent_id;
        }
        $data = [
            'user_id'=>!empty($request->user()) ? $request->user()->id : 0,
            'object_id'=>0,
            'exercise_id'=>$request->ex_id,
            'comment'=>$request->newCmt,
            'parent_id'=>$parent_id,
        ];
        return $this->create($data);
    }
}
