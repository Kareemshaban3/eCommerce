<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderFinishedController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [CategoryController::class, 'HomePage'])->name('homePage');

Route::get('/categories', [CategoryController::class, 'CategoryPage'])->name('categories.index');

Route::get('/about', [AboutController::class, 'AboutPage'])->name('about');


Route::get('/products/{catId?}', [ProductController::class, 'ProductPage'])->name('products.index');
Route::get('/productsCreate', [ProductController::class, 'AddProduct'])->name('products.create');
Route::post('/products', [ProductController::class, 'storeProduct'])->name('products.store');
Route::get('/products/{ProductId}/edit', [ProductController::class, 'EditProduct'])->name('products.edit');
Route::put('/products/{ProductId}', [ProductController::class, 'UpdateProduct'])->name('products.update');
Route::get('/products/{ProductId}/delete', [ProductController::class, 'RemoveProduct'])->name('products.delete');
Route::get('/searchProducts', [ProductController::class, 'searchProduct'])->name('products.search');
Route::get('/SingleProduct/{ProductId?}', [ProductController::class, 'SingleProduct'])->name('products.SinglePage');



Route::get('/addProductImage/{ProductId}', [ImageController::class, 'addProductImage'])->name('products.addImage')->middleware('auth');
Route::get('/RemoveProductImage/{imageId}', [ImageController::class, 'RemoveProductImage'])->name('products.remove');
Route::post('/StoreImage', [ImageController::class, 'storeProductImages'])->name('products.StoreImage');



Route::get('/reviews', [ReviewsController::class, 'Reviews'])->name('reviews.index')->middleware('auth');
Route::post('/reviews', [ReviewsController::class, 'StoreReview'])->name('reviews.store');



Route::get('/AdminController', [AdminController::class, 'AdminController'])->name('admin.index')->middleware('auth');
Route::get('/adminPanel', [AdminController::class, 'AdminPanel'])->name('admin.panel')->middleware('auth');
Route::get('/api/dashboard', [AdminController::class, 'apiIndex'])->middleware('api');
Route::get('/Customers', [AdminController::class, 'Customers'])->name('admin.customers');
Route::get('/product', [AdminController::class, 'product'])->name('admin.product');
Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');



Route::get('/Cart', [CartController::class, 'HandelCart'])->name('cart.index')->middleware('auth');
Route::get('/StoreCart/{productId}', [CartController::class, 'addToCart'])->name('cart.store')->middleware('auth');
Route::get('/DeleteCart/{productId}', [CartController::class, 'DeleteCart'])->name('cart.delete')->middleware('auth');
Route::get('/DecreaseQuantity/{productId}', [CartController::class, 'decreaseQuantity'])->name('cart.Decrease')->middleware('auth');
Route::post('/addCartFromSinglePage/{id}', [CartController::class, 'addCartFromSinglePage'])->name('cart.addCartFromSinglePage')->middleware('auth');


Route::post('/Checkout', [CheckOutController::class, 'CheckOutHandler'])->name('Checkout.index')->middleware('auth');
Route::post('/StoreCheckout', [CheckOutController::class, 'storeCheckout'])->name('checkouts.store')->middleware('auth');

Route::get('/OrderFinished', [OrderFinishedController::class, 'OrderFinished'])->name('OrderFinished.index')->middleware('auth');


Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]); // نخزن اللغة في الـ session
    }
    return redirect()->back(); // نرجع المستخدم لنفس الصفحة
})->name('locale.switch');
