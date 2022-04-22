<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    
    public function index(){
    $product_category = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
    $product_brand = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    
    $all_products = DB::table('tbl_product')->where('product_status','1')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.product.all_products')->with('all_products',$all_products);
    // $all_products = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(9)->get();

    return view('pages.home')->with('category',$product_category)->with('brand',$product_brand)->with('all_products',$all_products);
    }
}