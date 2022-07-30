<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

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

    public function place_order(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pin_code' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pin_code');

        $total = 0;
        $cartitem_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitem_total as $product){
            $total += $product->products->selling_price;
        }
        $order->total_price = $total;

        $order->tracking_no = 'newaz'.rand();
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->products->selling_price,
            ]);
            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->quantity;
            $product->save();
        }

        if (Auth::user()->phone == NULL && Auth::user()->address1== NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pin_code');
            $user->save();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        Toastr::success('Order Placed Successfully');
        return redirect()->route('thank.you');
    }

    public function payment_check(Request $request){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartItems as $item){
            $total_price += $item->products->selling_price * $item->quantity;
        }

         $firstname = $request->input('first_name');
         $lastname = $request->input('last_name');
         $email = $request->input('email');
         $phone = $request->input('phone');
         $address1 = $request->input('address1');
         $address2 = $request->input('address2');
         $city = $request->input('city');
         $state = $request->input('state');
         $country = $request->input('country');
         $pincode = $request->input('pincode');

         return response()->json([
             'firstname' =>  $firstname,
             'lastname' =>  $lastname,
             'email' =>  $email,
              'phone' =>  $phone,
             'address1' =>  $address1,
             'address2' =>  $address2,
             'city' =>  $city,
             'state' =>  $state,
             'country' =>  $country,
             'pincode' =>  $pincode,
             'total_price' => $total_price
         ]);

    }
}
