@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search results for "{{ $query }}"</h2>
        <div class="row justify-content-center">
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @foreach($products as $product)
                            <x-product :product="$product" />
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
