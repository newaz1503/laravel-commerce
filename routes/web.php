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
//get product
Route::get('product-list', [App\Http\Controllers\Frontend\HomeController::class, 'product_list'])->name('product.list');
Route::get('all-product', [App\Http\Controllers\Frontend\HomeController::class, 'all_product'])->name('all.product');
//search product
Route::post('search-product', [App\Http\Controllers\Frontend\HomeController::class, 'search_product'])->name('search.product');
//cart
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'add_cart'])->name('add.cart');
Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'update_cart'])->name('update.cart');
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'delete_cart'])->name('delete.cart');
Route::get('cart-count', [App\Http\Controllers\Frontend\CartController::class, 'cart_count'])->name('cart.count');

//wishlist
Route::post('add-to-wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'add_wishlist'])->name('add.wishlist');
Route::post('delete-wishlist-item', [App\Http\Controllers\Frontend\WishlistController::class, 'delete_wishlist'])->name('delete.wishlist');
Route::get('wishlist-count', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlist_count'])->name('wishlist.count');
//thank you
Route::get('thank-you', [App\Http\Controllers\Frontend\HomeController::class, 'thank_you'])->name('thank.you');

Route::middleware('auth')->group(function (){
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('show.cart');
    Route::get('/checkout', [\App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');
    Route::post('/place-order', [\App\Http\Controllers\Frontend\CheckoutController::class, 'place_order'])->name('place.order');
    //user oder
    Route::get('my-order', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('user.order');
    Route::get('view-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'view'])->name('view.order');
    Route::get('approve-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'approve_order'])->name('approve.order');
    //wishlist
    Route::get('my-wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index'])->name('wishlist');
    //payment gateway
    Route::post('/proceed-to-pay', [App\Http\Controllers\Frontend\CheckoutController::class, 'payment_check'])->name('payment.check');
    Route::post('/token', [App\Http\Controllers\Frontend\PaymentController::class, 'token'])->name('token');

    //rating
    Route::post('/add-rating', [App\Http\Controllers\Frontend\RatingController::class, 'add_rating'])->name('add.rating');
    //review product
    Route::get('/review/{slug}/userreview', [App\Http\Controllers\Frontend\ReviewController::class, 'review'])->name('review');
    Route::post('/add-review', [App\Http\Controllers\Frontend\ReviewController::class, 'add_review'])->name('add.review');
    Route::get('/edit-review/{slug}', [App\Http\Controllers\Frontend\ReviewController::class, 'edit_review'])->name('edit.review');
    Route::put('/update-review', [App\Http\Controllers\Frontend\ReviewController::class, 'update_review'])->name('update.review');


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

    //orders
    Route::get('orders', [\App\Http\Controllers\Admin\OrderController::class,'index'])->name('admin.orders');
    Route::get('orders/view/{id}', [\App\Http\Controllers\Admin\OrderController::class,'view'])->name('admin.orders.view');
    Route::put('orders/update/{id}', [\App\Http\Controllers\Admin\OrderController::class,'update'])->name('admin.order.update');
    Route::get('orders/history', [\App\Http\Controllers\Admin\OrderController::class,'order_history'])->name('admin.orders.history');
    //users
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.users');
    Route::get('user/view/{id}', [\App\Http\Controllers\Admin\UserController::class,'show'])->name('admin.user.view');



});