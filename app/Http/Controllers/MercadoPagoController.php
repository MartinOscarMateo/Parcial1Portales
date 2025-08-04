<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

class MercadoPagoController extends Controller
{
    public function pagar()
    {
        SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));

        $item = new Item();
        $item->title = 'Producto de prueba';
        $item->quantity = 1;
        $item->unit_price = 100.00;

        $preference = new Preference();
        $preference->items = [$item];

        $preference->back_urls = [
            "success" => route('pago.exito'),
            "failure" => route('pago.fallo'),
            "pending" => route('pago.pendiente')
        ];
        $preference->auto_return = "approved";

        $preference->save();

        return redirect($preference->init_point);
    }

    public function exito()
    {
        return "¡Pago exitoso!";
    }

    public function fallo()
    {
        return "El pago falló.";
    }

    public function pendiente()
    {
        return "El pago está pendiente.";
    }
}