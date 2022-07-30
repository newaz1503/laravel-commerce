<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review($slug){
        $product = Product::where('slug', $slug)->where('status', 1)->first();
        if ($product){
            $product_id = $product->id;
            $review = Review::where('product_id', $product_id)->where('user_id', Auth::id())->first();
            if ($review){
                return view('edit-review', compact('review', 'product'));
            }else{
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                    ->join('order_items','orders.id','order_items.order_id')
                    ->where('order_items.product_id', $product_id)->get();

                return view('review', compact('product', 'verified_purchase'));
            }
        }else{
            Toastr::error('Error', 'Product does not exists');
            return redirect()->back();
        }
    }

    public function add_review(Request $request){
        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->where('status', 1)->first();
        if ($product){
            $user_review = $request->user_review;
            Review::create([
                'user_id'  => Auth::id(),
                'product_id'  => $product_id,
                'review' => $user_review,
            ]);
            Toastr::success('Success', 'Thank you for reviewing this product');
            return redirect()->route('front.home');

        }else{
            Toastr::error('Error', 'Product does not exists');
            return redirect()->back();
        }

    }

    public function edit_review($slug){
        $product = Product::where('slug', $slug)->where('status', 1)->first();

        if ($product){
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($review){
                return view('edit-review', compact('review', 'product'));
            }else{
                Toastr::error('Error', 'Product does not exists');
                return redirect()->back();
            }

        }else{
            Toastr::error('Error', 'Product does not exists');
            return redirect()->back();
        }
    }

    public function update_review(Request $request){
        $user_review = $request->input('user_review');
        if ($user_review != ''){
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review){
                $review->review = $request->input('user_review');
                $review->save();
                Toastr::success('Success', 'Thank you for reviewing this product');
                return redirect()->route('product.details', $review->product->slug);
            }else{
                Toastr::error('Error', 'Product does not exists');
                return redirect()->back();
            }

        }else{
            Toastr::error('Error', 'You can not submit empty review');
            return redirect()->back();
        }
    }

}
