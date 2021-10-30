<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table = 'classes';
    public function testType()
    {
        return $this->hasMany(TestType::class, 'class_id');
    }
}
