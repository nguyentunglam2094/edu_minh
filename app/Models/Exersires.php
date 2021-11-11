<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exersires extends Model
{
    //
    protected $table = 'exercises';
    public function typeExercire()
    {
        return $this->hasOne(ExerciseType::class, 'id', 'exercises_type_id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class, 'exercise_id', 'id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function getImageQuestionAttribute($key)
    {
        $image = explode('|', $key);
        return !empty($image[0]) ? $image[0] : $image[1];
    }

    public function getDetail($id)
    {
        return $this->with(['typeExercire'])->where($this->primaryKey, $id)->first();
    }

    public function getDetailById($id)
    {
        return $this->with(['subject', 'class'])->where($this->primaryKey, $id)->first();
    }

    public function getDetailByCode($code)
    {
        return $this->with(['subject', 'class'])->where('code', $code)->first();
    }

    public function getExersires($type_id = 0)
    {
        if($type_id != 0){
            return $this->where('exercises_type_id', $type_id)->with('typeExercire')->orderBy('id','desc')->take(20)->get();
        }
        return $this->with('typeExercire')->orderBy('id','desc')->take(12)->get();
    }


    public function searchCodeExer($code = null)
    {
        $data = $this->with('typeExercire');
        if(!empty($code)){
            $data = $data->where('code', 'like', '%'.$code.'%');
        }
        return $data->orderBy('id','desc')->get();
    }

    /**
     * danh sách bài tập tương tự
     */
    public function listExerSame($detailEx)
    {
        return $this->with('typeExercire.subject')->where('id', '!=', $detailEx->id)->where('exercises_type_id', $detailEx->exercises_type_id)
        ->orderBy('id', 'desc')->get();
    }

    public function getExByClass($class_id, $subject_id)
    {
        return $this->with('class', 'subject')->where('class_id', $class_id)
        ->where('subject_id', $subject_id)->paginate(12);
    }

}
