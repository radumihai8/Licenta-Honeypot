<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $products = $category->products()->paginate(30);
        return view('category', compact('products', 'category'));
    }
}
