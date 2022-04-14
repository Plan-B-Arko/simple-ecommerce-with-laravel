<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart(Request $request){
        $cart = new Cart;
        $product = $request->product_id;
        $productexitscart = Cart::where(['product_id' => $product, 'user_id' => Auth::user()->id,
            'status'=>0])->first();
        if(!$productexitscart){
            $cart->product_qty = $request->product_qty;
            $cart->product_id = $product;
            $cart->user_id = Auth::user()->id;
            $query = $cart->save();
            if($query){
                return redirect('/dashboard')->with('success', 'Product added successfully');
            }
        }else{
            return redirect('dashboard/cart')->with('danger', 'Product already exists in cart');
        }
    }

    static function totalCartItem(){
        return Cart::where(['user_id'=>Auth::user()->id, 'status'=>0])->count();
    }

    public function dashboard_cart(){
        $data['title'] = 'Cart';
        $data['submenus'] = Category::all();
        $data['cartProducts'] = Cart::with(['product' => function($product){
            $product->with(['productDiscount'])->get();
        }])->where(['user_id'=>Auth::user()->id, 'status'=>0])->get();
        return view('layouts.pages.cart', $data);
    }

    public function cart_update(Request $request){
        $product_qtys = $request->product_qty;
        $cart_ids = $request->cart_id;
        foreach( $cart_ids as $index => $cart_id ) {
            DB::table('carts')->where('id', $cart_id)->update(['product_qty' => $product_qtys[$index]]);
        }
        return redirect('dashboard/cart')->with('success', 'Cart updated Successfully');
    }

    public function cart_item_delete($id){
        $query = Cart::where('id', $id)->delete();
        if($query){
            return redirect('dashboard/cart')->with('success', 'Cart item deleted Successfully');
        }
    }


}

