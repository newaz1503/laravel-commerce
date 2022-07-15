<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CartController;
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

//frontend route
Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'frontHome'])->name('front.home');
Route::get('/categories', [\App\Http\Controllers\Frontend\HomeController::class, 'categories'])->name('front.categories');
Route::get('/category-post/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'category_product'])->name('category.post');
Route::get('/product-details/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'product_details'])->name('product.details');

Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'add_cart'])->name('add.cart');
Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'update_cart'])->name('update.cart');
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'delete_cart'])->name('delete.cart');

Route::get('/checkout', [\App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');



Route::middleware('auth')->group(function (){
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('show.cart');
});

Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//backend route
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
   Route::get('dashboard', [DashboardController::class,'dashboard'])->name('admin.dashboard');

   //category
    Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category');
    Route::get('category/create', [\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin.category.create');
    Route::post('category/store', [\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.category.store');
    Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.category.edit');
    Route::put('category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.category.update');
    Route::delete('category/destroy/{id}', [\App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('admin.category.destroy');

    //product
    Route::get('product', [\App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.product');
    Route::get('product/create', [\App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin.product.create');
    Route::post('product/store', [\App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin.product.store');
    Route::get('product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin.product.edit');
    Route::put('product/update/{id}', [\App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin.product.update');
    Route::delete('product/destroy/{id}', [\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin.product.destroy');



});