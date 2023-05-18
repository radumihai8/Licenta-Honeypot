@extends('layouts.app')

@section('content')
<div class="row main-header p-5">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row justify-content-center">
                    <div class="col-md-4 pt-5">
                        <h1>Featured books of</h1>
                        <h1 class="fw-bold">{{ \Carbon\Carbon::now()->format('M') }}</h1>
                        <p><a class="btn btn-lg btn-primary" href="#">Explore today</a></p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('images/carousel-february.png') }}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>
<div class="container py-3">
{{--    <div class="row">--}}
{{--        <aside class="col-md-3">--}}
{{--            <nav class="card">--}}
{{--                <div class="list-group ">--}}
{{--                    <a href="#" class="list-group-item list-group-item-action active">--}}
{{--                        Categories--}}
{{--                    </a>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <a href="{{ route('category.show', $category->id) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </aside> <!-- col.// -->--}}
{{--        <div class="col-md-9">--}}
{{--            <article class="banner-wrap">--}}
{{--                <img src="https://t3.ftcdn.net/jpg/03/08/09/84/360_F_308098498_raQvWUt7e7dPnRl7xvxTMqJL1wfaYR3G.jpg" class="w-100 rounded">--}}
{{--            </article>--}}
{{--        </div> <!-- col.// -->--}}
{{--    </div> <!-- row.// -->--}}


    <div class="row">
        <h1 class="m-auto d-block text-center mb-5">Featured Categories</h1>
        <div class="row row-cols-2 row-cols-md-5 g-4">
            <div class="col">
                <a href="{{ route('category.show', 25) }}" class="card category-card p-3 bg-indigo-light">
                    <div class="card-body">
                        <i class="bi bi-book" style="font-size: 26px;"></i>
                        <h5 class="card-title">History</h5>
                        <p class="card-text">Shop Now</p>
                    </div>
                </a>
            </div>
            <a href="{{ route('category.show', 13) }}" class="col">
                <div class="card category-card p-3 bg-tangerine-light">
                    <div class="card-body">
                        <i class="bi bi-book" style="font-size: 26px;"></i>
                        <h5 class="card-title">Drama</h5>
                        <p class="card-text">Shop Now</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('category.show', 17) }}" class="col">
                <div class="card category-card p-3 bg-chili-light">
                    <div class="card-body">
                        <i class="bi bi-book" style="font-size: 26px;"></i>
                        <h5 class="card-title">Fiction</h5>
                        <p class="card-text">Shop Now</p>
                    </div>
                </div>
            </a>
            <div class="col">
                <a href="{{ route('category.show', 8) }}" class="card category-card p-3 bg-carolina-light">
                    <div class="card-body">
                        <i class="bi bi-book" style="font-size: 26px;"></i>
                        <h5 class="card-title">Cooking</h5>
                        <p class="card-text">Shop Now</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('category.show', 26) }}" class="card category-card p-3 bg-punch-light">
                    <div class="card-body">
                        <i class="bi bi-book" style="font-size: 26px;"></i>
                        <h5 class="card-title">Technology</h5>
                        <p class="card-text">Shop Now</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
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
