<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    //
    protected $table = 'teachers';

    /**
     * get all teachers
     */
    public function getTeachers()
    {
        return $this->orderBy('id', 'desc')->get();
    }
}
