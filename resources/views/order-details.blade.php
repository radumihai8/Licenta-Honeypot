@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Details</h2>
        <div class="row">
            <div class="col-md-6">
                <h5>Order Information</h5>
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <th>Order ID:</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Date:</th>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>{{ ucfirst($order->status) }}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{!! $order->address !!}, {!! $order->city !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h5>Products</h5>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach($order->orderProducts as $orderProduct)
                        <tr>
                            <td>{{ $orderProduct->product->title }}</td>
                            <td>{{ $orderProduct->price }} Lei</td>
                            <td>{{ $orderProduct->quantity }}</td>
                            <td>{{ $orderProduct->price * $orderProduct->quantity }} Lei</td>
                        </tr>
                        @php
                            $totalPrice += $orderProduct->price * $orderProduct->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="3">Shipping</td>
                        <td>9.99 Lei</td>
                    </tr>
                    </tbody>
                </table>
                <h5>Total Price: {{ $totalPrice + 9.99 }} Lei</h5>
            </div>
        </div>
    </div>
@endsection
