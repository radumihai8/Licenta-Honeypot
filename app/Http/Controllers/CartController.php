<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()
    {
        $cart_items = CartItem::where('user_id', auth()->user()->id)->get();
        return view('cart', compact('cart_items'));
    }

    function store(Request $request)
    {
        $product = Product::find($request->product_id);
        //validate if the product exists
        if (!$product) {
            abort(404);
        }
        //check if the product is already in the cart
        $cartItem = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first();
        if ($cartItem) {
            //if the product is already in the cart, increase the quantity
            $cartItem->quantity++;
            $cartItem->save();
            return redirect()->back();
        }



        //create a new cartitem with the product id and the user id
        $cartItem = new CartItem();
        $cartItem->product_id = $product->id;
        $cartItem->user_id = auth()->user()->id;
        $cartItem->quantity = 1;
        $cartItem->save();
        return redirect()->back();
    }

    public function remove($cartItemId)
    {
        $user = auth()->user();
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', $user->id)->first();

        if (!$cartItem) {
            return redirect()->back()->withErrors(['error' => 'Cart item not found.']);
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
