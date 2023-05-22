@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Confirmation</h2>
        <div class="row">
            <div class="col-md-12">
                <h4>Thank you for your order!</h4>
                <br>
                <p>Order ID: {{ $order->id }}</p>
                <p>Status: {{ ucfirst($order->status) }}</p>
                <p>Address: {!! $order->address !!}</p>
                <p>City: {!! $order->city !!}</p>

                <h4>Order Details</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach($order->orderProducts as $orderProduct)
                        <tr>
                            <td>{{ $orderProduct->product->title }}</td>
                            <td>{{ $orderProduct->quantity }}</td>
                            <td>{{ $orderProduct->price * $orderProduct->quantity }} Lei</td>
                        </tr>
                        @php
                            $totalPrice += $orderProduct->price * $orderProduct->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="2">Shipping</td>
                        <td>9.99 Lei</td>
                    </tr>
                    </tbody>
                </table>
                <h5>Total Price: {{ $totalPrice + 9.99}} Lei</h5>
            </div>
        </div>
    </div>
@endsection
