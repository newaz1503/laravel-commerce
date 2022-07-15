<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function frontHome(){
        $products = Product::where('trending',1)->take(15)->get();
        $categories = Category::where('popular', '1')->get();
        return view('index', compact('products','categories'));
    }

    public function categories(){
        $categories = Category::where('status', '1')->get();
        return view('categories', compact('categories'));
    }

    public function category_product($slug){
        if (Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', 1)->get();
            return view('post_by_category', compact('products','category'));
        }else{
            Toastr::error('Error', 'Something went wrong');
            return redirect()->route('front.home');
        }

    }

    public function product_details($slug){
        if (Product::where('slug', $slug)->exists()){
            $product = Product::where('slug', $slug)->first();
            return view('product-details', compact('product'));
        }else{
            Toastr::error('Error', 'Something went wrong');
            return redirect()->route('front.home');
        }
    }


}
