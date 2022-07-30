<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status', 0)->get();
        return view('admin.order.index', compact('orders'));
    }


    public function view($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.order.view', compact('orders'));
    }

    public function update(Request $request, $id){
        $order = Order::where('id', $id)->first();
        $order->status = $request->input('order_status');
        $order->save();
        Toastr::success('Order Updated Successfully', 'Success');
        return redirect()->route('admin.orders');
    }

    public function order_history(){
        $orders = Order::where('status', 1)->get();
        return view('admin.order.history', compact('orders'));
    }

}
