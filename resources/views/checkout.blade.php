@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        <div class="row">
            <div class="alert alert-info">
                <p class="mb-0">Shipping will be done in 2-3 working days, you will receive a tracking order as soon as the order leaves our warehouse!</p>
            </div>
            <div class="col-md-8">
                <form method="POST" action="{{ route('placeOrder') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3" placeholder="Enter any additional details"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Place Order</button>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Order Summary</h4>
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
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->product->price * $item->quantity }} Lei</td>
                        </tr>
                        @php
                            $totalPrice += $item->product->price * $item->quantity;
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
