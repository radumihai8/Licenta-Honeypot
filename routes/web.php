<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    //get 30 most popular products
    $products = Product::orderBy('sales', 'desc')->take(30)->get();
    $categories = Category::all();
    return view('home', compact('products', 'categories'));
});

//routes available only to authenticated users

Route::middleware(['auth'])->group(function () {
    //cart.store
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    //cart.index
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');

    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('placeOrder');

    Route::get('/order-confirmation/{orderId}', [App\Http\Controllers\CheckoutController::class, 'orderConfirmation'])->name('orderConfirmation');

    Route::delete('/cart/{cartItemId}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

    Route::post('/product/{productId}/review', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

    Route::get('/my-orders', [OrderController::class, 'userOrders'])->name('orders.user');

    Route::get('/order/{orderId}', [OrderController::class, 'show'])->name('order.show');

    Route::get('/bill', [OrderController::class, 'getBill'])->name('orders.getBill');

});

//category view route
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
//product view route
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');




Route::get('/home', function () {
    //get 30 most popular products
    $products = Product::orderBy('sales', 'desc')->take(30)->get();
    $categories = Category::all();
    return view('home', compact('products', 'categories'));
});
