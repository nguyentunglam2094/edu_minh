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

    public function getTypeEx()
    {
        return $this->with(['subject'])->get();
    }

    public function detail($id)
    {
        return $this->with(['subject'])->where($this->primaryKey, $id)->first();
    }

}
