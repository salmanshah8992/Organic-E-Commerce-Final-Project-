<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //pending orders
    public function pendingOrder(){
        $orders = Order::where('status', 0)->orderBy('id','DESC')->get();
        return view('backend.orders.pending',compact('orders'));
    }

    //orders view
    public function viewOrders($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItems = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.orders.view-order',compact('order','orderItems'));
    }

     //processing
     public function processingOrder(){
        $orders = Order::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.orders.processing',compact('orders'));
    }

    //delivery order
    public function deliveredOrders(){
        $orders = Order::where('status',2)->orderBy('id','DESC')->get();
        return view('backend.orders.delivered',compact('orders'));
    }

    public function cancelOrders(){
        $orders = Order::where('status',3)->orderBy('id','DESC')->get();
        return view('backend.orders.cancel',compact('orders'));
    }

    // cancel orders
    public function cancelDeliver($id){
        Order::findOrFail($id)->update([
                'status' => 3,
                'confirmed_date' => Carbon::now()
        ]);
        return redirect()->route('cancel-orders');
    }

    // confirm order
    public function orderCOnfirm($id){
        Order::findOrFail($id)->update([
                'status' => 1,
                'confirmed_date' => Carbon::now()
        ]);
        return redirect()->route('processing-orders');
    }

    // deliver order
    public function orderDeliver($id){
        Order::findOrFail($id)->update([
            'status' => 2,
            'confirmed_date' => Carbon::now()
        ]);
        return redirect()->route('delivered-orders');
    }

}
