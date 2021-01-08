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

    public function getExersires($type_id = 0)
    {
        if($type_id != 0){
            return $this->where('exercises_type_id', $type_id)->with('typeExercire')->orderBy('id','desc')->get();
        }
        return $this->with('typeExercire')->orderBy('id','desc')->get();
    }
}
