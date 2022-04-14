<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function new_order_list(){
        $data['title'] = 'New Order List';
        $data['order_datas'] = Checkout::with(['cart' => function($cart){
            $cart->with(['product'=> function($product) {
                $product->with(['productDiscount'])->get();
            }])->get();
        }])->where(['order_manage'=>0])->orderBy('id', 'DESC')->get();
        return view('admin.order_list', $data);
    }

    public function order_confirm($id){
        $query = Checkout::where('id', $id)->update(['order_manage'=>1]);
        if ($query){
            return redirect('/new/order/list')->with('success', 'Order Confirm');
        }
    }

    public function order_delivered(){
        $data['title'] = 'Delivered Order List';
        $data['order_datas'] = Checkout::with(['cart' => function($cart){
            $cart->with(['product'=> function($product) {
                $product->with(['productDiscount'])->get();
            }])->get();
        }])->where('order_manage', 1)->orWhere('order_manage', 2)->orderBy('id', 'DESC')->get();
        return view('admin.order_delivered', $data);
    }


}
