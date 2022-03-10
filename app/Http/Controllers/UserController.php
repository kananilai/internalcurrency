<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8',
        ]);
        if(
            User::create([
                'name' =>$request['name'],
                'email' =>$request['email'],
                'password' =>Hash::make($request['password']),
            ])
        );
        return redirect ('/login');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $request->session()->regenerate();
            return redirect('/top');
        }
        else{
            $msg='メールアドレスまたはパスワードが違います。';
            return view('/login',['message'=>$msg]);
        }
    }

    public function logout(Request $request)
        {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/top');
    }
}
