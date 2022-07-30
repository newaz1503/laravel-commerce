<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = WishList::where('user_id', Auth::id())->get();
        return view('wishlist', compact('wishlists'));
    }

    public function add_wishlist(Request $request){
        $product_id = $request->product_id;

        if (Auth::check()){
            $product = Product::where('id', $product_id)->first();
            if ($product){
                if (WishList::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json([
                        'status' => 'Product Already added'
                    ]);
                }else{
                    $wishlist = new WishList();
                    $wishlist->user_id = Auth::id();
                    $wishlist->product_id = $product_id;
                    $wishlist->save();
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

    public function delete_wishlist(Request $request){
        if (Auth::check()){
            $product_id = $request->product_id;
            if (WishList::where('product_id',$product_id)->where('user_id', Auth::id())->exists()){
                $wishlist_Item = WishList::where('product_id',$product_id)->where('user_id', Auth::id())->first();
                $wishlist_Item->delete();
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

    public function wishlist_count(){
        $wishlist_items = WishList::where('user_id', Auth::id())->count();
        return response()->json([
            'count' => $wishlist_items,
        ]);
    }
}
