<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Restuarant;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $data['title'] = 'Dashboard';
        $data['submenus'] = Category::where(['status'=>0])->get();
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
        $data['products'] = Product::with('ProductCategory','productDiscount')
            ->where('status', 0)->limit(6)->get();
        $data['slider'] = Product::where('status','=',0)->limit(3)->inRandomOrder()->get();;
        return view('layouts.pages.dashboard', $data);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function dashboard_category(Request $request, $id){
        $data['title'] = 'Category';
        $data['submenus'] = Category::all();
        $data['search_category'] = Category::where('id', $id)->first();
        $data['products'] = Product::with('ProductCategory','productDiscount')->where(['category_id'=> $id, 'status' => 0])->get();
        return view('layouts.pages.singlecategory', $data);
    }

    public function dashboard_single_product($id){
        $data['title'] = 'Single Product';
        $data['submenus'] = Category::all();
        $data['products'] = Product::with('ProductCategory','productDiscount')->where(['id'=> $id])->get();
        return view('layouts.pages.product', $data);
    }

    public function dashboard_search(Request $request){
        $data['title'] = 'Search product';
        $data['submenus'] = Category::all();
        $data['cat_name'] = $request->cat_name;

        $cat_id = $request->cat_id;
        $min = $request->min;
        $max = $request->max;
        $data['searched_product'] = Product::with('ProductCategory', 'productDiscount')
            ->where('category_id',$cat_id)->whereBetween('price', [$min, $max])->get();
        return view('layouts.pages.dashboard_search_product', $data);
    }

    public function contact(){
        $data['title'] = 'Contact Us';
        $data['submenus'] = Category::all();
        return view('layouts.pages.dashboard_contactus', $data);
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
        return view('layouts.pages.dashboard_aboutus', $data);
    }

    public function top_restaurant(){
        $data['title'] = 'Top Restaurant';
        $data['submenus'] = Category::where(['status'=>0])->get();
        $data['top_restaurants'] = Restuarant::all();
        return view('layouts.pages.top_restaurant', $data);
    }
}
