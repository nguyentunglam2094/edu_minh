<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    //
    protected $table = 'password_resets';
    protected $fillable = [
        'email', 'token',
    ];

    /**
     * get token by email
     * @author lamnt
     * @param string email
     * @date 2021 01 19
     */
    public function getDetail($email)
    {
        return $this->where('email', $email)->first();
    }
}
