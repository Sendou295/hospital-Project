<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Category
Route::get('/add-category', [\App\Http\Controllers\CategoryController::class, 'add_category']);
Route::get('/edit-category/{category_id}', [\App\Http\Controllers\CategoryController::class, 'edit_category']);
Route::get('/delete-category/{category_id}', [\App\Http\Controllers\CategoryController::class, 'delete_category']);
Route::get('/all-categories', [\App\Http\Controllers\CategoryController::class, 'all_categories']);

Route::get('/active-category/{category_id}', [\App\Http\Controllers\CategoryController::class, 'active_category']);
Route::get('/unactive-category/{category_id}', [\App\Http\Controllers\CategoryController::class, 'unactive_category']);

Route::post('/save-category', [\App\Http\Controllers\CategoryController::class, 'save_category']);
Route::post('/update-category/{category_id}', [\App\Http\Controllers\CategoryController::class, 'update_category']);

//Brand
Route::get('/add-brand', [\App\Http\Controllers\BrandController::class, 'add_brand']);
Route::get('/edit-brand/{brand_id}', [\App\Http\Controllers\BrandController::class, 'edit_brand']);
Route::get('/delete-brand/{brand_id}', [\App\Http\Controllers\BrandController::class, 'delete_brand']);
Route::get('/all-brands', [\App\Http\Controllers\BrandController::class, 'all_brands']);

Route::get('/active-brand/{brand_id}', [\App\Http\Controllers\BrandController::class, 'active_brand']);
Route::get('/unactive-brand/{brand_id}', [\App\Http\Controllers\BrandController::class, 'unactive_brand']);

Route::post('/save-brand', [\App\Http\Controllers\BrandController::class, 'save_brand']);
Route::post('/update-brand/{brand_id}', [\App\Http\Controllers\BrandController::class, 'update_brand']);

//Product
Route::get('/add-product', [\App\Http\Controllers\ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'delete_product']);
Route::get('/all-products', [\App\Http\Controllers\ProductController::class, 'all_products']);

Route::get('/active-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'active_product']);
Route::get('/unactive-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'unactive_product']);

Route::post('/save-product', [\App\Http\Controllers\ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'update_product']);


//Cart
Route::post('/update-cart', [\App\Http\Controllers\CartController::class, 'update_cart']);
Route::post('/save-cart', [\App\Http\Controllers\CartController::class, 'save_cart']);
Route::get('/show-cart', [\App\Http\Controllers\CartController::class, 'show_cart']);
Route::get('/delete-cart/{rowId}', [\App\Http\Controllers\CartController::class, 'delete_cart']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
