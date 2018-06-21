<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\MessageBag;
use App\Models\User;
use Validator;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getLogin() {
        
    }

    public function postLogin(Request $request) {
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:5'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
       if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
       } else {
           $login = [
               'email' => $request->email,
               'password' => $request->password
           ];
            if( Auth::attempt($login)) {
                $user = Auth::user();
                if($user->role_id == 1){
                    return redirect()->route('admin./');
                }else{
                    return redirect()->route('index');
                }

            } 
            else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
       }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->intended('/');
    }

}

