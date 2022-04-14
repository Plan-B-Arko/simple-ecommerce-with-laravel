<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmindashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admindashboard(){
        $data['title'] = 'Admin Dashboard';
        return view('admin.admin_dashboard', $data);
    }

    public function admin_logout(){
        Auth::logout();
        return redirect('/royalfood/admin');
    }

    public function contact_list(){
        $data['title'] = 'Admin Dashboard';
        $data['contacts'] = Contact::where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.contact_list', $data);
    }

    public function replied($id){
        $query = Contact::where('id', $id)->update(['status'=>1]);
        if ($query){
            return redirect('admin/new/contact')->with('success', 'Replied Done');
        }
    }

    public function replied_list(){
        $data['title'] = 'Admin Dashboard';
        $data['contacts'] = Contact::where('status', 1)->get();
        return view('admin.replied_list', $data);
    }
}
