<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Review;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(){
        $query = Cart::where(['user_id'=>Auth::user()->id, 'status'=>0 ])->count();
        if($query < 1){
            return redirect('dashboard/cart')->with('danger', 'At least add one product in your cart');
        }
        $data['title'] = 'Checkout';
        $data['submenus'] = Category::all();
        $data['cartProducts'] = Cart::with(['product' => function($product){
            $product->with(['productDiscount'])->get();
        }])->where(['user_id'=>Auth::user()->id, 'status'=>0])->get();
        return view('layouts.pages.checkout', $data);
    }

    public function product_checkout(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'cash' => 'required',
        ]);
        $query = Cart::where(['user_id'=>Auth::user()->id, 'status'=>0])->get();
        foreach ($query as $item){
            $cart = new Checkout;
            $cart->first_name = $request->first_name;
            $cart->last_name = $request->last_name;
            $cart->phone = $request->phone;
            $cart->address = $request->address;
            $cart->payment_method = $request->cash;
            $cart->payment_status = 'pending';
            $cart->status = 0;
            $cart->order_manage = 0;
            $cart->cart_id = $item['id'];
            $cart->user_id = Auth::user()->id;
            $cart->save();
            Cart::where(['user_id'=>Auth::user()->id, 'status'=>0])->update(['status'=>1]);
        }
        return redirect('/dashboard')->with('success', 'Your order placed Successfully and Continue shopping');
    }

    public function order_list(){
        $data['title'] = 'Orders';
        $data['submenus'] = Category::all();
        $data['order_datas'] = Checkout::with(['cart' => function($cart){
            $cart->with(['product'=> function($product) {
                $product->with(['productDiscount'])->get();
            }])->get();
        }])->where(['user_id'=>Auth::user()->id])->orderBy('id', 'DESC')->get();
        return view('layouts.pages.orders', $data);
    }

    public function product_delivered($id){
        $query = Checkout::where('id', $id)->update(['order_manage'=>2, 'payment_status'=>'Paid']);
        if($query){
            return redirect('order/list')->with('success', 'Thanks a lot for your contribution');
        }
    }

    public function food_review(){
        $data['title'] = 'Food Review';
        $data['submenus'] = Category::all();
        $data['order_datas'] = Checkout::with(['cart' => function($cart){
            $cart->with(['product'=> function($product) {
                $product->with(['productDiscount'])->get();
            }])->get();
        }])->where(['user_id'=>Auth::user()->id, 'status'=>0, 'order_manage'=>2])
            ->orderBy('id', 'DESC')->get();
        $data['reviewed'] = Review::with('reviewedProduct')->where(['user_id'=>Auth::user()->id])->get();
        return view('layouts.pages.food_review', $data);
    }

    public function single_food_review(Request $request){
        $review = new Review;
        $review->star = $request->review;
        $review->user_id = Auth::user()->id;
        $review->product_id = $request->product_id;
        $review->save();

        $cart_id = $request->cart_id;
        $query = Checkout::where(['user_id'=>Auth::user()->id,
            'status'=>0, 'order_manage'=>2, 'cart_id'=>$cart_id])->update(['status'=>1]);
        if ($query){
            return redirect('/dashboard/food/review')->with('success', 'Thanks for your review');
        }

    }
}
