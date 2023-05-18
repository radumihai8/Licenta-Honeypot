@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="mb-4">{{ ucwords($category->name) }}</h2>


        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($products as $product)
                <x-product :product="$product" />
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
