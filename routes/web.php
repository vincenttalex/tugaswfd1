<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/product', [ResourceController::class, 'index'])->name('product');

Route::get('/store', function () {
    return view('store'); 
})->name('store');

Route::delete('/products/{id}', [ResourceController::class, 'destroy'])->name('products.destroy');


// Route::get('/products', [ResourceController::class, 'index']);