<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BookBarn') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--custom css-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>
@php
    use App\Models\CartItem;
@endphp
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="logo img-fluid" style="max-height: 100px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu multi-column">
                                <div class="row">
                                    @foreach($categories->chunk(10) as $chunk) <!-- Adjust '10' as needed to manage column count -->
                                    <div class="col">
                                        @foreach($chunk as $category)
                                            <a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{ ucwords($category->name) }}</a>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>

                    </ul>

                    <form action="{{ route('search') }}" method="GET" class="d-flex mx-auto">
                        <input type="text" name="query" class="form-control" placeholder="Search products...">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>

                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item me-2">
                                <form class="d-flex">
                                    <a class="btn btn-outline-dark" href="{{route('cart.index')}}">
                                        <i class="bi-cart-fill me-1"></i>
                                        Cart
                                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{ CartItem::where('user_id', auth()->user()->id)->count() }}</span>                                </a>
                                </form>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('orders.user') }}">
                                        {{ __('My Orders') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 pt-0">
            <div class="container">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            @yield('content')
        </main>
    </div>
    <footer class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <!-- join our newsletter -->
                <div class="col-md-8 mb-4">
                    <h2 class="m-auto text-center mb-4">Join Our Newsletter</h2>
                    <form action="" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control py-3" placeholder="Email address" aria-label="Email address" aria-describedby="button-addon2">
                            <button class="btn btn-primary ms-3" type="submit" id="button-addon2">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img class="mw-25 mb-3" style="max-height: 100px" src="{{ asset('images/logo.png') }}" alt="BookBarn">
                    <p>Bulevardul Unirii 493, Bucharest, Romania </p>
                    <p class="mb-0">contact@bookbarn.ro</p>
                    <p class="mb-0">+40 (555) 143-457</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-semibold mb-3">About Us</h5>
                    <p>BookHouse, your one-stop shop for all things literature. Founded in 2023, BookHouse has since been serving the community of book lovers, offering an extensive range of titles across a multitude of genres.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-semibold mb-3">Stay Connected</h5>
                    <p>Follow us on social media for the latest news and deals:</p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <p class="text-center">&copy; 2023 {{env('APP_NAME')}} All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
