@extends('layouts.app')

@section('content')
    <div class="container mt-5 single-product">
        <div class="row mb-5">
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->title }}" class="img-fluid rounded">
                @else
                    <img src="https://via.placeholder.com/300" alt="{{ $product->title }}" class="img-fluid rounded">
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="mb-3 product_title">{{ $product->title }}</h2>
                <h5 class="mb-3">{{ $product->subtitle }}</h5>
                <h6>By <span class="text-muted">{{$product->author_list}}</span></h6>
                <h1 class="my-4">{{ number_format($product->price, 2) }} RON</h1>


                <p class="text-muted">{{ $product->description }}</p>
                <div class="mb-3">
                    <span class="font-weight-bold">Rating:</span>
                    @for($i = 1; $i <= $product->rating; $i++)
                        <i class="bi bi-star-fill text-warning"></i>
                    @endfor
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold"> Views: </span> <i class="bi bi-eye"></i>  {{ $product->views }}
                </div>
                <form action="{{ route('cart.store') }}" method="POST" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-large-black btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="row mb-5">
            <h2 class="mb-5">Product details</h2>

            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Category</th>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Page count</th>
                        <td>{{$product->page_count}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Publisher</th>
                        <td>Published by {{ $product->publisher }} on {{ $product->published_date }}</td>
                    </tr>
                    <tr>
                        <th scope="row">ISBN</th>
                        <td>{{ $product->isbn }}</td>
                    </tr>
                    <tr>
                        <th scope="row">ISBN 13</th>
                        <td>{{ $product->isbn13 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <h2 class="mb-5">Reviews</h2>
                @foreach($reviews as $review)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">{{$review->user->name}}: {{ $review->title }}</h3>
                            <p class="card-text">{!! $review->comment !!}</p>
                            <p>Rating:
                                @for($i = 1; $i <= $review->rating; $i++)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @auth
            <div class="row">
                <div class="col-12">
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
            </div>
        @endauth
    </div>
@endsection
