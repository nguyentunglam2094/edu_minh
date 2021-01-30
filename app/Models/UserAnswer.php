<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    //
    protected $table = 'user_answer';
    protected $fillable = ['id', 'user_test_id', 'answer', 'question_number'];
}
