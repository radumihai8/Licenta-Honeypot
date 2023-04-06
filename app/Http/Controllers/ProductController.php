<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        $category = $product->category;
        $reviews = $product->reviews;
        return view('product', compact('product', 'category', 'reviews'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(12);

        return view('search-results', compact('products', 'query'));
    }

}
