<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandController extends Controller
{
    public function AuthentificationLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand(){
        $this->AuthentificationLogin();
        return view('admin.brand.add_brand');
    }
    public function all_brands(){
        $this->AuthentificationLogin();
        $all_brands = DB::table('tbl_brand')->get();
        $manager_brand = view('admin.brand.all_brands')->with('all_brands',$all_brands);
        return view('layouts.admin')->with('admin.brand.all_brands', $manager_brand);
    }
    public function save_brand(Request $request){
        $this->AuthentificationLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','successful brand creation');
        return Redirect::to('all-brands');
    }
    public function active_brand($brand_id){
        $this->AuthentificationLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        Session::put('message','successful to unactive brand status');
        return Redirect::to('all-brands');
    }
    public function unactive_brand($brand_id){
        $this->AuthentificationLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        Session::put('message','successful to active brand status');
        return Redirect::to('all-brands');
    }   

    public function edit_brand($brand_id){
        $this->AuthentificationLogin();
        $edit_brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
        $manager_brand = view('admin.brand.edit_brand')->with('edit_brand',$edit_brand);
        return view('layouts.admin')->with('admin.brand.edit_brand', $manager_brand);
    }   
    public function update_brand(Request $request,$brand_id){
        $this->AuthentificationLogin();
        $data =array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
        Session::put('message','successful to update brand');
        return Redirect::to('all-brands');
    }
    public function delete_brand($brand_id){
        $this->AuthentificationLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        Session::put('message','successful to delete brand');
        return Redirect::to('all-brands');
    }

    public function show_brand_shop($brand_id){
        $product_category = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        $product_brand = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    
        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();

        $brand_title = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();
        return view('pages.Brand.show_brand')
        ->with('category',$product_category)
        ->with('brand',$product_brand)
        ->with('brand_by_id',$brand_by_id)
        ->with('brand_title',$brand_title);
    }
}
