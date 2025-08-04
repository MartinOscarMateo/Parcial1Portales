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

    public function create()
    {
        return view('admin.products.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:90',
            'price' => 'required|numeric|min:1|max:999999',
            'description' => 'required|string|min:10|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'extra_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'extra_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $image = $request->file('image')->store('products', 'public');
        $extraImage1 = $request->file('extra_image_1')?->store('products', 'public');
        $extraImage2 = $request->file('extra_image_2')?->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image,
            'extra_image_1' => $extraImage1,
            'extra_image_2' => $extraImage2,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'extra_image_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'extra_image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('extra_image_1')) {
            if ($product->extra_image_1 && Storage::disk('public')->exists($product->extra_image_1)) {
                Storage::disk('public')->delete($product->extra_image_1);
            }
            $validated['extra_image_1'] = $request->file('extra_image_1')->store('products', 'public');
        }

        if ($request->hasFile('extra_image_2')) {
            if ($product->extra_image_2 && Storage::disk('public')->exists($product->extra_image_2)) {
                Storage::disk('public')->delete($product->extra_image_2);
            }
            $validated['extra_image_2'] = $request->file('extra_image_2')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Producto actualizado.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!empty($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        if (!empty($product->extra_image_1)) {
            Storage::disk('public')->delete($product->extra_image_1);
        }
        if (!empty($product->extra_image_2)) {
            Storage::disk('public')->delete($product->extra_image_2);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}