<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6)->withQueryString(); 

        return view('products.index', compact('products')); 
    }

    public function adminIndex()
    {
        $products = Product::paginate(5)->withQueryString(); 

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
            'price' => 'required|numeric|min:1|max:999999',
            'description' => 'required|string|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => '/' . $request->file('image')->store('products', 'public'),
        ]);
    

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.'); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:90',
            'price' => 'required|numeric|min:1|max:999999',
            'description' => 'required|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Elimina la imagen anterior
            $imagePath = ltrim($product->image, '/');
            Storage::disk('public')->delete($imagePath);

            // Guarda la nueva imagen
            $newImage = '/' . $request->file('image')->store('products', 'public');
        } else {
            $newImage = $product->image;
        }
        
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $newImage,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.'); 
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Eliminar la imagen del producto
        $imagePath = ltrim($product->image, '/');
        Storage::disk('public')->delete($imagePath);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.'); 
    }
}
