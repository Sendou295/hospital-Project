<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }


    public function add_product(){
        $this->AuthentificationLogin();
        $product_category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $product_brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.product.add_product')->with('product_category', $product_category)->with('product_brand',$product_brand);
    }
    public function all_products(){
        $this->AuthentificationLogin();
        $all_products = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.product.all_products')->with('all_products',$all_products);
        return view('layouts.admin')->with('admin.product.all_products', $manager_product);
    }
    public function save_product(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_image'] = $request->product_image;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','successful product creation');
            return Redirect::to('all-products');
        }
        $data['product_image'] = ' ';
        DB::table('tbl_product')->insert($data);
        Session::put('message','successful product creation');
        return Redirect::to('all-products');
    }
    public function active_product($product_id){
        $this->AuthentificationLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','successful to unactive product status');
        return Redirect::to('all-products');
    }
    public function unactive_product($product_id){
        $this->AuthentificationLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','successful to active product status');
        return Redirect::to('all-products');
    }   

    public function edit_product($product_id){
        $this->AuthentificationLogin();
        $product_category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $product_brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.edit_product')
        ->with('edit_product',$edit_product)
        ->with('product_category',$product_category)
        ->with('product_brand',$product_brand);
        return view('layouts.admin')->with('admin.product.edit_product', $manager_product);
    }   
    public function update_product(Request $request,$product_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','successful update product');
            return Redirect::to('all-products');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','unsuccessful update product');
        return Redirect::to('all-products');

    }
    public function delete_product($product_id){
        $this->AuthentificationLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','successful to delete product');
        return Redirect::to('all-products');
    }




    public function details_product($product_id){
        $product_category = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        $product_brand = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $details_products = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        return view('pages.product.show_product_detail')
        ->with('category',$product_category)
        ->with('brand',$product_brand)
        ->with('details_products',$details_products);
    }
}
