<?php

use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/products/{id}', [ResourceController::class, 'show']);

Route::resource('products', ResourceController::class)->only(['store', 'destroy', 'update']);

Route::get('/store', function () {
    return view('store'); 
})->name('store');

