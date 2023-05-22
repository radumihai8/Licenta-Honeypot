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
                    <td>{{ number_format($product->price, 2) }} Lei</td>
                    <td>{{ number_format($cart_item->quantity * $product->price, 2) }} Lei</td>
                    <td>
                        <form action="{{ route('cart.remove', $cart_item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>

                </tr>
            @endforeach
                <!-- shipping row -->
                <tr>
                    <td colspan="3">Shipping</td>
                    <td>9.99 Lei</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-3">
            <h4>Total: {{ number_format($total+(9.99), 2) }} Lei</h4>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{route('checkout')}}" class="btn btn-success">Checkout</a>
        </div>
    </div>
@endsection
