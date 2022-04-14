<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $data['title'] = 'Contact Us';
        $data['submenus'] = Category::all();
        return view('layouts.pages.contact_us', $data);
    }

    public function contact_process(Request $request){
        $con = new Contact;
        $con->name = $request->name;
        $con->email = $request->email;
        $con->subject = $request->subject;
        $con->message = $request->message;
        $con->status = 0;
        $query = $con->save();

        if($query){
            return back()->with('success', 'Thanks for contact with us. Admin will contact with you as soon as possible');
        }
    }

    public function aboutus(){
        $data['title'] = 'About Us';
        $data['submenus'] = Category::all();
        return view('layouts.pages.aboutus', $data);
    }
}
