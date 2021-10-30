<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    //
    protected $table = 'test_type';
    protected $fillable = ['class_id', 'title'];

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

}
