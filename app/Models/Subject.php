<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subjects';

    public function getDetailSubject($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }

    public function getDetailBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
