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

    public function adminIndex()
    {
        $products = Product::all(); 

        return view('admin.products.index', compact('products')); 
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:90',
            'description' => 'required|string|max:200',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
    

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.'); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:90',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:200',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.'); 
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.'); 
    }
}
