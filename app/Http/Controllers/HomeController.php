<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->limit(3)->get();

        return view('home', compact('products'));
    }
}