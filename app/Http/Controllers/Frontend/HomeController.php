<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function frontHome(){
        $trending_products = Product::where('trending',1)->take(15)->get();
        $products = Product::where('status',1)->take(9)->get();
        return view('index', compact('trending_products','products'));
    }

    public function all_product(){
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('all-product', compact('products'));
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
            $ratings = Rating::where('product_id', $product->id)->get();
            $rating_sum = Rating::where('product_id', $product->id)->sum('star_rating');
            $user_rating = Rating::where('product_id', $product->id)->where('user_id', Auth::id())->first();
            $reviews = Review::where('product_id', $product->id)->get();
            if ($ratings->count() > 0){
                $rating_value = $rating_sum / $ratings->count();
            }else{
                $rating_value = 0;
            }
            return view('product-details', compact('product','rating_value', 'ratings', 'user_rating', 'reviews'));
        }else{
            Toastr::error('Error', 'Something went wrong');
            return redirect()->route('front.home');
        }
    }

    public function product_list(){
        $products = Product::select('name')->where('status', 1)->get();
        $data = [];

        foreach ($products as $item){
            $data[] = $item['name'];
        }
        return $data;
    }

    public function search_product(Request $request){
        $search_input = $request->input('search_field');

        if ($search_input != ''){
            $product = Product::where("name","LIKE","%$search_input%")->first();
            if ($product){
                return redirect()->route('product.details',$product->slug);
            }else{
                Toastr::error('Error', 'Product nor found');
            }
        }else{
          return redirect()->back();
        }

    }

    public function thank_you(){
        return view('thank-you');
    }


}
