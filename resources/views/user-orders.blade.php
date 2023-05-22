@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>My Orders</h2>
        <div class="row">
            <div class="col-md-12">
                @if($orders->isEmpty())
                    <p>You have no orders.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Details</th>
                            <th>Bill</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>{{ ucfirst($order->status) }}</td>
                                <td>
                                    {{ $order->orderProducts->sum(function ($orderProduct) {
                                    return $orderProduct->price * $orderProduct->quantity;
                                }) }} Lei
                                </td>
                                <td>
                                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('orders.getBill', ['name' => 'bill_'.$order->id.'.pdf']) }}">View Bill</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
