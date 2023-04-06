<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function userOrders()
    {
        $user = auth()->user();
        $orders = Order::with('orderProducts.product')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('user-orders', compact('orders'));
    }

    public function show($orderId)
    {
        $user = auth()->user();
        $order = Order::with('orderProducts.product')->where('id', $orderId)->where('user_id', $user->id)->firstOrFail();

        return view('order-details', compact('order'));
    }

}
