<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('products.index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/forum', function () {
    return view('forum');
});
