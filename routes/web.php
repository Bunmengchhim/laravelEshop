<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController1;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




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

Route::get('/',[FrontendController1::class , 'index']);
Route::get('category',[FrontendController1::class, 'category']);
Route::get('view-category/{slug}',[FrontendController1::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController1::class, 'productview']);

Auth::routes();

Route::post('add-to-cart',[Cartcontroller::class , 'addProduct']);
Route::post('delete-cart-item',[Cartcontroller::class , 'deleteProduct']);
Route::post('update-cart',[Cartcontroller::class , 'updateCart']);
Route::post('add-to-wishlist',[WishlistController::class,'add']);


Route::middleware(['auth'])->group(function (){
Route::get('cart', [Cartcontroller::class, 'viewcart']);
Route::get('checkout',[checkoutController::class, 'index']);
Route::post('place-order',[checkoutController::class, 'placeorder']);
Route::get('my-order', [UserController::class,'index']);
Route::get('view-order/{id}',[UserController::class, 'view']);
Route::get('wishlist',[WishlistController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



 Route::middleware(['auth','isAdmin' ])->group(function(){
    Route::get('/dashboard',[FrontendController::class,'index']);
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class , 'add']);
    Route::post('insert-category',[ CategoryController::class , 'insert']);
    Route::get('edit-category/{id}' , [CategoryController::class , 'edit']);
    Route::put('update-category/{id}',[CategoryController::class ,'update']);
    Route::get('delete-pro/{id}',[CategoryController::class ,'destroy']);
    Route::get('products', [ProductController::class , 'index' ]);
    Route::get('add-products', [ProductController::class , 'add' ]);
    Route::post('insert-products',[ProductController::class, 'insert']);
    Route::get('edit-product/{id}' , [ProductController::class , 'edit']);
    Route::put('update-products/{id}',[ProductController::class ,'update']);
    Route::get('delete-products/{id}',[ProductController::class ,'destroy']);  
    Route::get('orders',[OrderController::class, 'index'] );
    Route::get('admin/view-orders/{id}',[OrderController::class, 'view']);
    Route::put('update-order/{id}',[OrderController::class, 'updateorder']);
    Route::get('order-history',[OrderController::class, 'orderhistory']);
    Route::get('users',[DashboardController::class , 'users'] );
    Route::get('view-users/{id}',[DashboardController::class, 'viewusers']);


 });

