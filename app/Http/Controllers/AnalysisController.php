<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Review;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    static function total_user(){
        return User::where('userRole', 2)->count();
    }

    static function orderPlaced(){
        return Checkout::where('order_manage', 0)->count();
    }

    static function ontheway(){
        return Checkout::where('order_manage', 1)->count();
    }

    static function delivered(){
        return Checkout::where('order_manage', 2)->count();
    }

    static function review(){
        return Review::count();
    }

    static function contact_request(){
        return Contact::where('status', 0)->count();
    }

}
