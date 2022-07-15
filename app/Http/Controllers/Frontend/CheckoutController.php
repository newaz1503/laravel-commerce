<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $old_cartItems = Cart::where('user_id', Auth::id())->get();

        foreach ($old_cartItems as $item){
            if (!Product::where('id', $item->product_id)->where('quantity', '>=', $item->quantity)->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('checkout', compact('cartItems'));
    }
}
