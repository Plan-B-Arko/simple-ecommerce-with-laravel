<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product(){
        $data['title'] = 'product List';
        $data['products']  = Product::with('ProductCategory','productDiscount')->get();
        return view('admin.product_list', $data);
    }

    public function add_product(){
        $data['title'] = 'Add Product';
        $data['discount'] = DB::table('discounts')->get();
        $data['category'] = DB::table('categories')->get();
        return view('admin.add_product', $data);
    }

    public function product_process(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $imageName = $request->file('image');
        $new_name = $imageName->getClientOriginalName();
        $request->image->move(public_path('/admin/product'), $new_name);
        $product->image = $new_name;
        $product->category_id = $request->category;
        $product->discount_id = $request->discount_option;

        $query = $product->save();

        if($query){
            return redirect('/admin/add/product')->with('success', 'product added Successfully');
        }else{
            return redirect('/admin/add/product')->with('danger', 'Something went Wrong');
        }
    }

    public function edit_product(Request $request, $id){
        $data['title'] = 'Edit product';
        $data['discount'] = DB::table('discounts')->get();
        $data['category'] = DB::table('categories')->get();
        $data['products']  = Product::with('ProductCategory','productDiscount')->where('id', $id)->get();
        return view('admin.edit_product', $data);
    }

    public function edit_process(Request $request, $id){
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $quantity = $request->quantity;
        $imageName = $request->file('image');
        $new_name = $imageName->getClientOriginalName();
        $request->image->move(public_path('/admin/product'), $new_name);
        $category_id = $request->category;
        $discount_id = $request->discount_option;

        $update = Product::where('id',$id)->update(['name'=> $name, 'description'=> $description, 'price'=>
            $price, 'quantity' => $quantity, 'image' => $new_name, 'category_id' => $category_id, 'discount_id' =>
            $discount_id]);

        if($update){
            return redirect('/admin/product/list')->with('success', 'product edited Successfully');
        }else{
            return redirect('/admin/product/list')->with('danger', 'Something went Wrong');
        }
    }

    public function product_active(Request $request){
        $update = Product::where('id',$request->id)->update(['status'=> 0 ]);
        if($update){
            $data['data']  = true;
            $data['message'] = 'Product Active Now';
            return $data;
        }
    }

    public function product_inactive(Request $request){
        $update = Product::where('id',$request->id)->update(['status'=> 1 ]);
        if($update){
            $data['data']  = true;
            $data['message'] = 'Product Inactive Now';
            return $data;
        }
    }

    public function product_remove($id){
        $delete = Product::where('id',$id)->delete();
        if($delete){
            return redirect()->back()->with('success', 'Sucessfully Deleted');
        }else{
            return redirect()->back()->with('danger', 'Something went Wrong');
        }
    }
}
