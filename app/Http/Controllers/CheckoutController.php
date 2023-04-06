<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        return view('checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'Your cart is empty.']);
        }

        // Validate the request
        $request->validate([
            'address' => 'required',
            'city' => 'required',
        ]);

        // Create a new order
        $order = new \App\Models\Order();
        $order->user_id = $user->id;
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->status = 'pending';
        $order->save();

        // Associate cart items with the order
        foreach ($cartItems as $item) {
            $orderProduct = new \App\Models\OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item->product_id;
            $orderProduct->quantity = $item->quantity;
            $orderProduct->price = $item->product->price;
            $orderProduct->save();

            // Remove item from the cart
            $item->delete();
        }

        // Redirect the user to the order confirmation page
        return redirect()->route('orderConfirmation', $order->id);
    }

    public function orderConfirmation($orderId)
    {
        $order = \App\Models\Order::with('orderProducts.product')->findOrFail($orderId);

        return view('order-confirmation', compact('order'));
    }


}
