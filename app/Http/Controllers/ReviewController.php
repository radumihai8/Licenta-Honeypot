<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new review
        $review = new Review();
        $review->user_id = $user->id;
        $review->product_id = $productId;
        $review->title = $request->input('title');
        $review->comment = $request->input('comment');
        $review->rating = $request->input('rating');
        $review->save();

        // Redirect the user back to the product page with a success message
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
