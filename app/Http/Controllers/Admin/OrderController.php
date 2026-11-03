<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders($status)
    {
        if($status == 'all')
            {
                 $orders = Order::orderBy('id', 'desc')->with('orderDetails')->paginate(20);
            }
            else
                {
                    $orders = Order::orderBy('id', 'desc')->with('orderDetails')->where('status', $status)->paginate(20);
                }
        
        return view('admin.order.list',compact('orders'));
    }
}
