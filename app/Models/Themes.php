<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    //
    protected $table = 'themes';
    protected $fillable = ['subject_id', 'class_id', 'title', 'description', 'image'];

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function detail($id)
    {
        return $this->with('typeEx')->where($this->primaryKey, $id)->first();
    }

    public function typeEx()
    {
        return $this->hasMany(ExerciseType::class, 'theme_id', 'id');
    }

    public function getListTheme()
    {
        return $this->orderBy('id','desc')->get();
    }

    public function getOtherTopic($detail)
    {
        return $this->where('id', '!=', $detail->id)->where('subject_id', $detail->subject_id)->get();
    }
}
