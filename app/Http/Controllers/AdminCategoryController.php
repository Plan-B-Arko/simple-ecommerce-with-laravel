<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category(){
        $data['title'] = 'Category List';
        $data['categories']  = Category::with('discount')->get();
        return view('admin.categorylist', $data);
    }

    public function add_category(){
        $data['title'] = 'Add Category';
        $data['discount'] = DB::table('discounts')->get();
        return view('admin.add_category', $data);
    }


    public function category_process(Request $request){
        $category = new Category;
        $category->name = $request->sub_category;
        $category->maincategory = $request->main_category;

        $query = $category->save();

        if($query){
            return redirect('/admin/add/category')->with('success', 'Sub Category added Sucessfully');
        }else{
            return redirect('/admin/add/category')->with('danger', 'Something went Wrong');
        }

    }

    public function edit_category(Request $request,$id){
        $data['title'] = 'Edit Category';
        $data['category'] = Category::with('discount')->where('id', $id)->get();
        $data['discount'] = DB::table('discounts')->get();
        return view('admin.edit_category', $data);
    }

    public function edit_process(Request $request, $id){
        $cat_name = $request->sub_category;
        $main_cat = $request->main_category;
        $update = Category::where('id',$id)->update(['name'=> $cat_name, 'maincategory'=> $main_cat]);
        if ($update){
            return redirect('/admin/category/list')->with('success', 'Sub Category Edited Sucessfully');
        }else{
            return redirect('/admin/category/list')->with('danger', 'Something went Wrong');
        }
    }

    public function category_active(Request $request){
        $update = Category::where('id',$request->id)->update(['status'=> 0 ]);
        if($update){
            $data['data']  = true;
            $data['message'] = 'Category Inactive Now';
            return $data;
        }
    }

    public function category_inactive(Request $request){
        $update = Category::where('id',$request->id)->update(['status'=> 1 ]);
        if($update){
            $data['data']  = true;
            $data['message'] = 'Category Active Now';
            return $data;
        }
    }

    public function category_delete(Request $request,$id){
        $delete = Category::where('id',$id)->delete();
        if($delete){
            return redirect('/admin/category/list')->with('success', 'Sucessfully Deleted');
        }else{
            return redirect('/admin/category/list')->with('danger', 'Something went Wrong');
        }
    }


}
