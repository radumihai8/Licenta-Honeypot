@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/300" alt="{{ $product->name }}" class="img-fluid">
                @endif
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <div class="mb-3">
                    <span class="font-weight-bold">Price:</span> ${{ number_format($product->price, 2) }}
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Category:</span> {{ $product->category->name }}
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Rating:</span>
                    @for($i = 1; $i <= $product->rating; $i++)
                        <i class="bi bi-star-fill"></i>

                    @endfor
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold"> Views: <i class="bi bi-eye"></i>  {{ $product->views }}  </span>
                </div>
                <a href="{{ route('cart.store', $product->id) }}" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>
    <div class="container">
    <h1 class="mb-5">Reviews</h1>
    <!-- reviews -->
    @foreach($reviews as $review)

            <div class="row">
                <div class="col-md-6">
                    <h3>{{$review->user->name}}: {{ $review->title }}</h3>
                    <p>{{ $review->comment }}</p>
                    <p>Rating:                     @for($i = 1; $i <= $product->rating; $i++)
                            <i class="bi bi-star-fill"></i>

                        @endfor</p>
                </div>
            </div>

        <hr>
    @endforeach

    @auth
        <h4>Leave a review</h4>
        <form method="POST" action="{{ route('review.store', $product->id) }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
            </div>
            <!-- select from 5 to 1, default 5 -->
            <div class="form-group mb-3">
                <label for="rating">Rating</label>
                <select name="rating" class="form-control" id="rating">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endauth

@endsection
