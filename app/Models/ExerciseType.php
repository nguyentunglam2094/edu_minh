<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    //
    protected $table = 'exercise_type';

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
    public function exercise()
    {
        return $this->hasMany(Exersires::class, 'exercises_type_id', 'id');
    }

    public function getTypeEx($paginate = 0, $class = null, $subject = null)
    {
        if($paginate != 0){
            $data = $this->with(['subject']);
            if(!empty($subject)){
                $data =  $data->where('subject_id', $subject);
            }
            if(!empty($class)){
                $data =  $data->where('class_id', $class);
            }
            return $data->orderBy('id', 'desc')->paginate(12);
        }
        return $this->with(['subject'])->orderBy('id', 'desc')->get();
    }

    public function detail($id)
    {
        return $this->with(['subject'])->where($this->primaryKey, $id)->first();
    }

    public function detailByCode($code)
    {
        return $this->with(['subject', 'exercise'])->where('code', $code)->first();
    }

    public function getOtherType($detail)
    {
        return $this->where($this->primaryKey, '!=', $detail->id)->where('theme_id', $detail->theme_id)->get();
    }

    /**
     * lấy danh sách danh mục khác
     */
    public function getList($detailType)
    {
        return $this->with(['subject'])->where($this->primaryKey, '!=', $detailType->id)
        ->where('subject_id', $detailType->subject_id)
        ->where('class_id', $detailType->class_id)->orderBy('id','desc')->Get();
    }
}
