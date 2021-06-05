<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\Users;
use App\Notifications\PasswordResetRequest;
use Exception;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class PasswordController extends Controller
{
    //
    public function viewReset()
    {
        return view('auth_login.password.forgot_password');
    }

    public function confirmEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
        ]);
        $user = Users::where('email', $request->email)->first();
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => \Str::random(6),
            ]
        );

        if ($user && $passwordReset) {
            $user->notify(
                new PasswordResetRequest($passwordReset->token, $user->email)
            );
        }
        return back()->with([
            'status' => __('Truy cập email để lấy lại mật khẩu'),
        ]);
    }


    public function getViewReset($token)
    {
        try {
            $decodeToken = JWT::decode($token, 'RG9uc3NUUU9JQzVUcUs0ZGNMcFpjRG8yaFZjS3BEMXA=', array('HS256'));
            return view('auth_login.password.reset')->with([
                'token'=>$decodeToken->token,
                'email'=>$decodeToken->email
            ]);
        } catch (Exception $e) {
            return abort(403);
        }
    }


     /**
     * reset password
     * @author lamnt
     * @param request
     * @date 2021 01 19
     */
    public function reset(Request $request, PasswordReset $passwordReset, Users $users)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'token'=>'required|string',
            'password'=>'required|confirmed|min:6',
        ]);
        $checkToken =  $passwordReset->getDetail($request->email);
        if(!empty($checkToken) && $checkToken->token == $request->token){
            //update password
            try{
                $users->updatePassword($checkToken->email, $request->password);
                $checkToken->delete();
                return redirect()->route('view.login');
            }catch(Exception $e){
                return back()->with('error','Thay đổi mật khẩu thất bại');
            }
        }
        return back()->with('message','Mã xác nhận không chính xác');
    }

}
