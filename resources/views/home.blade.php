@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row">
        <aside class="col-md-3">
            <nav class="card">
                <div class="list-group ">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Categories
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('category.show', $category->id) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                    @endforeach
                </div>
            </nav>
        </aside> <!-- col.// -->
        <div class="col-md-9">
            <article class="banner-wrap">
                <img src="https://t3.ftcdn.net/jpg/03/08/09/84/360_F_308098498_raQvWUt7e7dPnRl7xvxTMqJL1wfaYR3G.jpg" class="w-100 rounded">
            </article>
        </div> <!-- col.// -->
    </div> <!-- row.// -->

    <div class="row justify-content-center">

            <section class="">
                <h1 class="m-auto d-block text-center mb-5">Most popular products</h1>

                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                        @foreach($products as $product)
                            <x-product :product="$product" />

                        @endforeach
                    </div>
                </div>
            </section>




    </div>
</div>
@endsection
