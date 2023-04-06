<!-- resources/views/components/product-card.blade.php -->

@props(['product'])

<div class="col-md-3 col-sm-6 col-xs-12 mb-4">
    <div class="card h-100">
        @if($product->image)
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
        @else
            <img src="https://via.placeholder.com/100" alt="{{ $product->name }}" class="card-img-top">
        @endif
        <a class="card-body text-center" href="{{ route('product.show', $product->id) }}">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <div class="font-weight-bold d-block text-center mb-3">${{ number_format($product->price, 2) }}</div>

            <div class="d-flex justify-content-center align-items-center">
                <br>
                <div>
                    <form action="{{ route('cart.store') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-outline-dark">Add to Cart</button>
                    </form>
                </div>
            </div>
        </a>
    </div>
</div>
