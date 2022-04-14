<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::user()->email == $request->email && Auth::user()->userRole == 2 ) {
                return redirect('dashboard');
            }else{
                return redirect('account')->with('logindanger', 'User does not exists...!');
            }
        }
    }
}
