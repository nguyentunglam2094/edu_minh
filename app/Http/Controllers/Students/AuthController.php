<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Libraries\Ultilities;
use App\Models\Users;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required'
        ]);
        $admin_login_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );
        if(!Auth::attempt($admin_login_data)){
            return back()->with('error','Email hoặc mật khẩu không đúng');
        }

        if($request->user()->active == Users::INACTIVE){
            Auth::logout();
            return back()->with('error','Tài khoản của bạn chưa được kích hoạt');
        }

        if(!empty(session()->get('url.intended'))){
            return redirect()->intended(session()->get('url.intended'));
        }
        return redirect()->route('home.page');
    }

    public function viewSignup()
    {
        return view('auth_login.signup');
    }

    public function signup(Request $request, Users $users)
    {
        $request->merge([
            'phone' => Ultilities::replacePhone(Ultilities::clearXSS($request->phone)),
        ]);
        $request->validate([
            'email'=>'required|email|unique:users,email',
            'name'=>'required|string|max:100',
            'dob'=>'required',
            'phone' => 'nullable|sometimes|max:15|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|min:6|confirmed'
        ]);
        try{
            $user = $users->register($request);
            return redirect()->route('view.login')
            ->with(['alert-type' => 'success', 'message' => 'Đăng ký tài khoản thành công']);
        }catch(Exception $ex){
            return back()
            ->with(['alert-type' => 'error', 'message' => 'Đăng ký tài khoản thất bại']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            // $request->session()->forget('cart');
            Auth::logout();
        }
        return redirect()->route('home.page');
    }

    public function viewLogin()
    {
        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');
        if(($urlPrevious != $urlBase . '/dang-nhap') && ($urlPrevious != $urlBase . '/dang-ky-tai-khoan') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
            session()->put('url.intended', $urlPrevious);
        }
        return view('auth_login.login');
    }

    public function updateProfile(Users $user, Request $request)
    {
        $detail = $user->where('id', $request->user()->id)->first();
        return view('user.update_profile')->with([
            'user'=>$detail
        ]);
    }

    public function update(Request $request, Users $users)
    {
        $request->merge([
            'phone' => Ultilities::replacePhone(Ultilities::clearXSS($request->phone)),
        ]);
        $request->validate([
            'name'=>'required|string|max:30',
            'phone'=>'nullable|sometimes|max:15|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'image' => 'nullable|sometimes|mimes:jpeg,jpg,png,gif',
            'address'=>'nullable|sometimes'
        ]);
        try{
            $users->updateProfile($request);
            return back()
            ->with(['alert-type' => 'success', 'message' => 'Cập nhập tài khoản thành công']);
        }catch(Exception $ex){
            return back()
            ->with(['alert-type' => 'error', 'message' => 'Cập nhập tài khoản thất bại']);
        }
    }

    public function changePassword(Request $request, Users $users)
    {
        $request->validate([
            'old_password'=>'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);
        $hasher = app('hash');
        if (!$hasher->check(Ultilities::clearXSS($request->old_password), $request->user()->password)) {
            return back()->with(['alert-type' => 'error', 'message' => 'Mật khẩu cũ không đúng']);
        }
        try{
            $users->where('id', $request->user()->id)->update([
                'password'=>bcrypt($request->password)
            ]);
            return back()
            ->with(['alert-type' => 'success', 'message' => 'Cập nhập mật khẩu thành công']);
        }catch(Exception $ex){
            return back()
            ->with(['alert-type' => 'error', 'message' => 'Cập nhập mật khẩu thất bại']);
        }
    }

    public function viewChangePassword(Request $request)
    {
        return view('user.change_password');
    }
}
