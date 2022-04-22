<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category(){
        $this->AuthentificationLogin();
        return view('admin.category.add_category');
    }
    public function all_categories(){
        $this->AuthentificationLogin();
        $all_categories = DB::table('tbl_category')->get();
        $manager_category = view('admin.category.all_categories')->with('all_categories',$all_categories);
        return view('layouts.admin')->with('admin.category.all_categories', $manager_category);
    }
    public function save_category(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message','successful category creation');
        return Redirect::to('all-categories');
    }
    public function active_category($category_id){
        $this->AuthentificationLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
        Session::put('message','successful to unactive category status');
        return Redirect::to('all-categories');
    }
    public function unactive_category($category_id){
        $this->AuthentificationLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
        Session::put('message','successful to active category status');
        return Redirect::to('all-categories');
    }   

    public function edit_category($category_id){
        $this->AuthentificationLogin();
        $edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
        $manager_category = view('admin.category.edit_category')->with('edit_category',$edit_category);
        return view('layouts.admin')->with('admin.category.edit_category', $manager_category);
    }   
    public function update_category(Request $request,$category_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        DB::table('tbl_category')->where('category_id',$category_id)->update($data);
        Session::put('message','successful to update category');
        return Redirect::to('all-categories');
    }
    public function delete_category($category_id){
        $this->AuthentificationLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::put('message','successful to delete category');
        return Redirect::to('all-categories');
    }






    public function show_category_shop($category_id){
        $product_category = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        $product_brand = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    
        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
        ->where('tbl_product.category_id',$category_id)->get();

        $category_title = DB::table('tbl_category')->where('tbl_category.category_id',$category_id)->limit(1)->get();
        return view('pages.Category.show_category')
        ->with('category',$product_category)
        ->with('brand',$product_brand)
        ->with('category_by_id',$category_by_id)
        ->with('category_title',$category_title);
    }

}

