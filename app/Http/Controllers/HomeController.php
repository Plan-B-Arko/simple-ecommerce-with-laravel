<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home(){
        if(Auth::check() && Auth::user()->userRole == 2){
            return redirect('/dashboard');
        }
        $data['title'] = 'Home';
        $data['submenus'] = Category::all();
        // Top-rated food
        $trp = Review::select("product_id", \DB::raw("avg(star) as star"))
            ->groupBy("product_id")
            ->orderBy('star', 'Desc')
            ->limit(3)
            ->get();
        $review = array();
        foreach ($trp as $t){
            $b = Product::with('productDiscount')->where('id', $t->product_id)->first();
            array_push($review,$b);
        }
        $data['reviews'] = $review;
        // Special offer
        $query = Discount::orderBy('amount', 'desc')->limit(3)->get();
        $special_offer = array();
        foreach ($query as $item){
            $b = Product::with('productDiscount')->where('discount_id', $item->id)->first();
            array_push($special_offer,$b);
        }
        $data['special_offers'] = $special_offer;
        // Best-selling food
        $bsf = Cart::groupBy('product_id')->select('product_id', DB::raw('count(*) as total'))->limit(3)->get();
        $best_s_f = array();
        foreach ($bsf as $item){
            $c = Product::with('productDiscount')->where('id', $item->product_id)->first();
            array_push($best_s_f, $c);
        }
        $data['bsfs'] = $best_s_f;
        $data['products'] = Product::with('ProductCategory','productDiscount')->where('status','=',0)->limit(6)->get();
        $data['slider'] = Product::where('status','=',0)->limit(3)->inRandomOrder()->get();;
        return view('layouts.pages.index', $data);
    }

    public function product_category(Request $request, $id){
        $data['title'] = 'Category';
        $data['submenus'] = Category::all();
        $data['search_category'] = Category::where('id', $id)->first();
        $data['products'] = Product::with('ProductCategory','productDiscount')->where(['category_id'=> $id, 'status' => 0])->get();
        return view('layouts.pages.category', $data);
    }

    public function single_product($id){
        $data['title'] = 'Single Product';
        $data['submenus'] = Category::all();
        $data['products'] = Product::with('ProductCategory','productDiscount')->where(['id'=> $id])->get();
        return view('layouts.pages.singleproduct', $data);
    }

    public function search(Request $request){
        $data['title'] = 'Search product';
        $data['submenus'] = Category::all();
        $data['cat_name'] = $request->cat_name;

        $cat_id = $request->cat_id;
        $min = $request->min;
        $max = $request->max;
        $data['searched_product'] = Product::with('ProductCategory', 'productDiscount')
            ->where('category_id',$cat_id)->whereBetween('price', [$min, $max])->get();
        return view('layouts.pages.search_product', $data);
    }

}
