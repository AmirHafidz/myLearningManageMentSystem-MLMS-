<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request){

        $this->validate($request,[
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        $login_data = [
            'email' => $request->login_email,
            'password' => $request->login_password,
        ];

        if(Auth::attempt($login_data)){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->with('login_failed','You entered wrong credentails !');
        }
    }

    public function logout(){
        Session::flush();
        Auth()->logout();
        return redirect()->route('home.index');
    }
}
