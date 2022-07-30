<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('order', compact('orders'));
    }

    public function view($id){
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('order-view', compact('orders'));
    }

    public function approve_order(Request $request, $id){
        $order = Order::find($id);
        if ($order){
            $order->status = 1;
            $order->save();
            Toastr::success('Order Approved Successfully');
            return redirect()->back();

        }
    }

}
