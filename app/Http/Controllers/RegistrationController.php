<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function account(){
        if(Auth::check() && Auth::user()->userRole == 2){
            return redirect('/dashboard');
        }
        $data['title'] = 'Account';
        $data['submenus'] = Category::all();
        return view('layouts.pages.account', $data);
    }

    public function registration(Request $request){
        $email = $request->email;
        $user = User::whereEmail($email)->first();
        if($user){
            return redirect('account')->with('danger', 'User Already exists !');
        }else{
            $user = new User;
            $user->name = substr($email = $request->email, 0, strrpos($email = $request->email, '@'));
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $query = $user->save();
            if($query){
                return redirect('account')->with('success', 'Registration Successful');
            }else{
                return redirect('account')->with('danger', 'Something went Wrong');
            }
        }
    }
}
