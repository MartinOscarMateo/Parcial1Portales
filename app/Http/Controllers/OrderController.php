<?php

namespace App\Http\Controllers;

use App\Models\ItemOrden;
use App\Models\Orden;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
       
        $ordenes = Orden::with(['user', 'itemsOrden.product'])->latest()->get();

        return view('admin.orders.index', compact('ordenes'));
    }

    public function destroy($id)
    {
        $order = Orden::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
