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
        $ItemOrders = ItemOrden::all();
        $orders = Orden::all();

        // Filtrar usuarios que tienen al menos un item en alguna orden
        $userIdsWithItems = $orders->pluck('user_id')->unique();
        $users = User::whereIn('id', $userIdsWithItems)->get();

        // Calcular el precio total por cada orden individual del usuario
        $orderTotals = [];
        foreach ($orders as $order) {
            $orderTotal = 0;
            foreach ($ItemOrders->where('orden_id', $order->id) as $item) {
                $orderTotal += $item['price'] * $item['quantity'];
            }
            $orderTotals[$order->id] = $orderTotal;
        }

        return view('admin.orders.index', compact('orders', 'ItemOrders', 'users', 'orderTotals'));
    }

    public function destroy($id)
    {
        $order = Orden::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
