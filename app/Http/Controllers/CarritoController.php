<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Orden;
use App\Models\ItemOrden;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('carrito.index', compact('cart', 'totalPrice'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $size = $request->input('size', 'N/A');
        $key = $id . '-' . $size;

        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'size' => $size,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Producto agregado al carrito');
    }

    public function updateQuantity(Request $request, $key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
        }

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada');
    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('carrito.index')->with('success', 'Carrito vacío');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('carrito.checkout', compact('cart', 'totalPrice'));
    }

    public function finalizar()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('carrito.index')->with('error', 'No hay productos en el carrito.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Crear la orden
        $orden = Orden::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'estado' => 'pendiente',
        ]);

        foreach ($cart as $key => $item) {
            ItemOrden::create([
                'orden_id' => $orden->id,
                'product_id' => explode('-', $key)[0],
                'size' => $item['size'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Pago::create([
            'orden_id' => $orden->id,
            'metodo' => 'mercado_pago',
            'estado' => 'pendiente',
            'referencia' => null,
        ]);

        session()->forget('cart');

        return view('carrito.gracias', ['orden' => $orden]);
    }
}
