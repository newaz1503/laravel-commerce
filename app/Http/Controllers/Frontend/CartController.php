<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart(){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }

    public function add_cart(Request $request){
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        if (Auth::check()){
            $product = Product::where('id', $product_id)->first();
            if ($product){
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json([
                        'status' => 'Product Already added'
                    ]);
                }else{
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->product_id = $product_id;
                    $cart->quantity	 = $quantity;
                    $cart->save();
                    return response()->json([
                        'status' => 'Product added successfully'
                    ],200);
                }
            }
        }else{
            return response()->json([
                'status' => 'You need to login first'
            ]);
        }
    }

    public function update_cart(Request $request){
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        if (Auth::check()){
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $cartItem = Cart::where('product_id',$product_id)->where('user_id', Auth::id())->first();
                $cartItem->quantity = $quantity;
                $cartItem->save();
                return response()->json([
                    'status' => 'Cart Updated Successfully'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'You need to login first'
            ]);
        }
    }

    public function delete_cart(Request $request){
        if (Auth::check()){
            $product_id = $request->product_id;
            if (Cart::where('product_id',$product_id)->where('user_id', Auth::id())->exists()){
                $cartItem = Cart::where('product_id',$product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json([
                    'status' => 'Product Deleted Successfully',
                ],200);
            }
        }else{
            return response()->json([
                'status' => 'You need to login first'
            ]);
        }
    }

    public function cart_count(){
        $cart_items = Cart::where('user_id', Auth::id())->count();
        return response()->json([
           'count' => $cart_items,
        ]);
    }

}
