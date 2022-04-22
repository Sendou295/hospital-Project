<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{  



    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_detail = DB::table('tbl_product')->where('product_id',$productId)->first();


        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        $data['id'] = $product_detail->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_detail->product_name;
        $data['price'] = $product_detail->product_price;
        $data['weight'] = $product_detail->product_price;
        $data['options']['image'] = $product_detail->product_image;
        Cart::add($data);
        Cart::setGlobalTax(10);
        // Cart::destroy();
        return Redirect::to('/show-cart');
        // $data = DB::table('tbl_product')->where('product_id',$productId)->get();
       
    }
    public function show_cart(){
        $product_category = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        $product_brand = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.Cart.show_cart')->with('category',$product_category)->with('brand',$product_brand);
    }

    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quatity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }



    // public $products = null;
    // public $totalPrice = 0;
    // public $totalQuantity = 0;
    // public function __constant($cart){
    //     if($cart){
    //         $this->products = $cart->products;
    //         $this->totalPrice = $cart->totalPrice;
    //         $this->totalQuantity = $cart->totalQuantity;
    //     }
    // }

    // public function addCart($product, $productId){
    //     $newProduct =['quatity' => 0,'price' => $product->product_price,'productInfo'=>$product];
    //     if($this ->$product){
    //         if(array_key_exists($productId, $products)){
    //         $newProduct = $products[$productId];
    //         }
    //         $newProduct['quantity']++;
    //         $newProduct['price'] = $newProduct['quantity'] * $product->product_price;
    //         $this->product[$productId] = $newProduct;
    //         $this->totalPrice += $product->product_price;
    //         $this->totalPrice += $newProduct['quantity'];
    //     }
    // }
    // public function Index(){
    //     $products = DB::table('tbl_product')->get();
    //     return view('/home',compact('tbl_product'));
    // }
    // public function add_cart(Request $request, $productId){
    //     $product = DB::table('tbl_product')->where('product_id',$productId)->first();
    //         if($product != null){
    //         $oldCart = Session('Cart') ? Session('Cart') : null;
    //         $newCart = new Cart($oldCart);
    //         $newCart -> add_cart($product, $productId);
    //         $request->session()->put('Cart', $newCart);
    //     }
    //     return view('pages.Cart.small_cart',compact('newCart'));
    // }   




}
