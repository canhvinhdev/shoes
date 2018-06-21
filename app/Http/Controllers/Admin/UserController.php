<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use App\Models\User;
use Auth;


class UserController extends Controller
{

    public function login()
    {
        return view('app.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }


    public function postRegister(Request $request)
    {
        $email = User::where('email','=',$request->email)->first();
        if(isset($email)){
            $errors = new MessageBag(['errorlogin' => 'Email đã được sử dụng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }else{
            $user = new User();
            $user->email =  $request->email;
            $user->role_id =  2;
            $user->username =  $request->username;
            $user->name =  $request->name;
            $user->password = bcrypt($request->password);
            $user->save();


            return redirect()->route('login-app');
        }

    }

    public function postlogin(Request $request)
    {
        $login2 = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2
        ];
  
        if( Auth::attempt($login2)) {
            return redirect()->route('index');
        }
        else {
            $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function register()
    {
        return view('app.register');
    }
}
