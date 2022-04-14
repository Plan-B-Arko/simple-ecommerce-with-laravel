<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Discount;

class AdminDiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function discount(){
        $data['title'] = 'Discount List';
        $data['discount'] = DB::table('discounts')->get();
        return view('admin.discount_list', $data);
    }

    public function add_discount(){
        $data['title'] = 'Add Discount';
        return view('admin.add_discount', $data);
    }

    public function discount_process(Request $request){
        $discount = new Discount;
        $discount->name = $request->name;
        $discount->amount = $request->amount;
        $discount->discount_option = $request->discount_option;

        $query = $discount->save();

        if($query){
            return redirect('/admin/add/discount')->with('success', 'Discount added successfully');
        }else{
            return redirect('/admin/add/discount')->with('danger', 'Something Went Wrong');
        }

    }

    public function edit_discount(Request $request, $id){
        $data['title'] = 'Edit Discount';
        $data['discount'] = Discount::where('id', $id)->get();
        return view('admin.edit_discount',$data);
    }

    public function discount_edit_process(Request $request, $id){
        $dis_name = $request->name;
        $dis_amount = $request->amount;
        $discount_option = $request->discount_option;

        $update = Discount::where('id',$id)->update(['name'=> $dis_name, 'amount'=> $dis_amount, 'discount_option'=>
            $discount_option ]);

        if ($update){
            return redirect('/admin/discount/list')->with('success', 'Discount Edited successfully');
        }else{
            return redirect('/admin/discount/list')->with('danger', 'Something Went Wrong');
        }

    }

    public function discount_delete(Request $request, $id){
        $delete = Discount::where('id',$id)->delete();
        if($delete){
            return redirect('/admin/discount/list')->with('success', 'Sucessfully Deleted');
        }else{
            return redirect('/admin/discount/list')->with('danger', 'Something went Wrong');
        }
    }
}
