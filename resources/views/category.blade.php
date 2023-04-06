@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="mb-4">{{ $category->name }}</h2>

        <div class="row">
            @foreach($products as $product)
                <x-product :product="$product" />
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
