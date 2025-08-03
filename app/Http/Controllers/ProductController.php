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
        $request->validate([
            'name' => 'required|string|min:2|max:90',
            'price' => 'required|numeric|min:1|max:999999',
            'description' => 'required|string|min:10|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'extra_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'extra_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->only(['name', 'price', 'description']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('extra_image_1')) {
            Storage::disk('public')->delete($product->extra_image_1);
            $data['extra_image_1'] = $request->file('extra_image_1')->store('products', 'public');
        }

        if ($request->hasFile('extra_image_2')) {
            Storage::disk('public')->delete($product->extra_image_2);
            $data['extra_image_2'] = $request->file('extra_image_2')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        if ($product->extra_image_1) {
            Storage::disk('public')->delete($product->extra_image_1);
        }
        if ($product->extra_image_2) {
            Storage::disk('public')->delete($product->extra_image_2);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
