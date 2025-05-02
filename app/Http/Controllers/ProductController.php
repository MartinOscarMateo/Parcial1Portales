<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); 

        return view('products.index', compact('products')); 
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $extraImages = [];

        if (!empty($product->extra_image_1)) {
            $extraImages[] = $product->extra_image_1;
        }

        if (!empty($product->extra_image_2)) {
            $extraImages[] = $product->extra_image_2;
        }


        $product->extra_images = $extraImages;

        return view('products.show', compact('product')); 
    }
}
