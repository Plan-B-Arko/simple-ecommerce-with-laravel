<?php

namespace App\Http\Controllers;

use App\Models\Restuarant;
use Illuminate\Http\Request;

class RestuarantController extends Controller
{
    public function restaurant(){
        $data['title'] = 'Restaurant';
        $data['restaurants'] = Restuarant::all();
        return view('admin.restaurant_list', $data);
    }

    public function add_restaurant(){
        $data['title'] = 'Add Restaurant';
        return view('admin.add_restaurant', $data);
    }

    public function store_restaurant(Request $request){
        $data = new Restuarant;
        $data->restaurant_name = $request->restaurant;
        $data->rating = $request->rating;

        $query = $data->save();
        if ($query){
            return redirect()->back()->with('success', 'Restaurant added Successfully');
        }
    }

    public function delete_restaurant($id){
        $delete = Restuarant::where(['id'=>$id])->delete();
        if ($delete){
            return redirect()->back()->with('success', 'Restaurant deleted successfully');
        }
    }
}
