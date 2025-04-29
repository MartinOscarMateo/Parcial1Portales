<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Esto trae todos los productos desde la base

        return view('products.index', compact('products')); // Esto te manda los productos a la vista
    }
}
