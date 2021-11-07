<?php

namespace App\Models;

use App\Libraries\Ultilities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use File;
use Illuminate\Support\Facades\Auth;

class Users extends Authenticatable
{
    //
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'avatar', 'dob', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($key)
    {
        if(!empty($key)){
            $path = public_path($key);
            $isExists = \File::exists($path);
            if(!$isExists){
                return null;
            }
        }
        return $key;
    }

    public function updatePassword($email, $pass)
    {
        return $this->where('email', $email)->update([
            'password'=>bcrypt($pass)
        ]);
    }

    public function register($request)
    {
        $data = [
            'email'=>Ultilities::clearXSS($request->email),
            'name'=>Ultilities::clearXSS($request->name),
            'phone'=>Ultilities::clearXSS($request->phone),
            'dob'=>Ultilities::formatDate($request->dob, 1),
            'password'=>bcrypt(Ultilities::clearXSS($request->password)),
        ];
        return $this->create($data);
    }

    public function updateProfile($request)
    {
        $data = [
            'name'=>Ultilities::clearXSS($request->name),
            'phone'=>Ultilities::clearXSS($request->phone),
            'address'=>Ultilities::clearXSS($request->address),
        ];
        if($request->hasFile('image')){
            $push = [
                'avatar'=>Ultilities::uploadFile($request->image),
            ];
            $data += $push;
        }
        return $this->where($this->primaryKey, $request->user()->id)->update($data);
    }

}
