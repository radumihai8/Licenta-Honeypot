
@props(['product'])

<div class="col mb-4">
    <div class="card h-100 product-card p-2">
        @if($product->image)
            <a href="{{ route('product.show', $product->id) }}" style="height: 250px;display: inline-flex;
justify-content: center;
align-content: center;">
                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="card-img-top p-4" style="object-fit: contain;">
            </a>
        @else
            <img src="https://via.placeholder.com/100" alt="{{ $product->title }}" class="card-img-top">
        @endif
        <div class="card-body text-center" >
            <div style="height:120px">
                <a class="fs-6 fw-bold text-black product-title" href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                <p class="fs-6 text-muted product-author">{{ $product->author_list }}</p>
                <a class="fs-6 fw-bold text-black product-price" href="{{ route('product.show', $product->id) }}">{{ number_format($product->price, 2) }} RON</a>

            </div>

        </div>
    </div>
</div>
