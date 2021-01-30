<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;
class Teachers extends Model
{
    //
    protected $table = 'teachers';

    public function getAvatarAttribute($key)
    {
        if(!empty($key)){
            $path = public_path($key);
            $isExists = File::exists($path);
            if(!$isExists){
                return null;
            }
        }
        return $key;
    }

    /**
     * get all teachers
     */
    public function getTeachers()
    {
        return $this->orderBy('id', 'desc')->get();
    }
}
