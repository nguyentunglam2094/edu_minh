<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    //
    protected $table = 'tests';

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function getAllTest()
    {
        return $this->with(['subject', 'class'])->orderBy('id', 'desc')->get();
    }

    public function getBySubjectId($subject_id)
    {
        return $this->with(['subject', 'class'])->where('subject_id', $subject_id)
        ->orderBy('id', 'desc')->paginate(16);
    }

    public function answers()
    {
        return $this->hasMany(TestAnswers::class, 'test_id', 'id');
    }

    public function getDetailTest($id)
    {
        return $this->with(['class', 'subject', 'answers'])->where($this->primaryKey, $id)->first();
    }

}
