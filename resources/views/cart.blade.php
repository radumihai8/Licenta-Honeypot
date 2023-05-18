@extends('layouts.app')

@section('content')
    @php
        $total = 0;
    @endphp
    <div class="container">
        <h2 class="mb-4">Shopping Cart</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart_items as $cart_item)
                @php
                    $product = $cart_item->product;
					$total += $cart_item->quantity * $product->price;
                @endphp
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $cart_item->quantity }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>${{ number_format($cart_item->quantity * $product->price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $cart_item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-3">
            <h4>Total: ${{ number_format($total, 2) }}</h4>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{route('checkout')}}" class="btn btn-success">Checkout</a>
        </div>
    </div>
@endsection
