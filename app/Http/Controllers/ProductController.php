<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $query = $request->input('query');

        //intentional sql injection
        $products = DB::select("SELECT * FROM products WHERE title LIKE '%$query%'");
        #ddd($products);

        return view('search-results', compact('products', 'query'));
    }


}
