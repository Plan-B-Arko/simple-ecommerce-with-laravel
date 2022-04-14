<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function adminhome(){
        if(Auth::check() && Auth::user()->userRole == 1){
            return redirect('/admin/dashboard');
        }
        return view('admin.admin_login');
    }

    public function admin_login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::user()->email == $request->email && Auth::user()->userRole == 1 ) {
                return redirect('/admin/dashboard')->with('success', 'Welcome to Admin Panel, Now manage your shop...');
            }else{
                return redirect('/royalfood/admin')->with('danger', 'User does not exists...!');
            }
        }
    }
}
