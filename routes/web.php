<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', function () {
    return view('products.index');
})->name('products');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');
