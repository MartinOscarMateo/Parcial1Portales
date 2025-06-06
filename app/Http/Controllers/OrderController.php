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

        $users = User::all();
        
        $ItemOrders = ItemOrden::all();

        $orders = Orden::all();

        // Calcular el precio total por cada orden individual del usuario
        $orderTotals = [];
        foreach ($orders as $order) {
            $orderTotal = 0;
            foreach ($ItemOrders->where('orden_id', $order->id) as $item) {
            $orderTotal += $item['price'] * $item['quantity'];
            }
            $orderTotals[$order->id] = $orderTotal;
        }

        return view('admin.orders.index' , compact('orders', 'ItemOrders', 'users', 'orderTotals'));
    }
}
