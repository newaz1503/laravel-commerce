<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add_rating(Request $request){
        $product_rating = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_exists = Product::where('id', $product_id)->where('status', 1)->first();

        if ($product_exists){
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                                ->join('order_items', 'orders.id', 'order_items.order_id')
                                ->where('order_items.product_id', $product_id)->get();

            if ($verified_purchase->count() > 0){
                $existing_rating = Rating::where('user_id', Auth::id())->where('product_id',$product_id)->first();

                if ($existing_rating){
                    $existing_rating->star_rating = $product_rating;
                    $existing_rating->save();
                    Toastr::success('Success', 'Thanks for rating this product');
                    return redirect()->back();
                }else{
                    Rating::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product_id,
                        'star_rating' => $product_rating,
                    ]);
                    Toastr::success('Success', 'Thanks for rating this product');
                    return redirect()->back();
                }
            }else{
                Toastr::error('Error', 'You can not rating this product Without Purchase');
                return redirect()->back();
            }

        }else{
            Toastr::error('Error', 'The link was broken');
            return redirect()->back();
        }
    }


}
