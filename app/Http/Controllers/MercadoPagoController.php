<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Resources\PreferenceRequest;
use MercadoPago\Resources\PreferenceItem;

class MercadoPagoController extends Controller
{
    public function pagar()
    {
        
        $accessToken = env('MERCADOPAGO_ACCESS_TOKEN');
        if (!$accessToken) {
            return redirect()->back()->with('error', 'No se configuró el token de MercadoPago.');
        }

        MercadoPagoConfig::setAccessToken($accessToken);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        $client = new PreferenceClient();

        $items = [];
        foreach ($cart as $item) {
            $mpItem = new PreferenceItem();
            $mpItem->title = $item['name'];
            $mpItem->quantity = (int) $item['quantity'];
            $mpItem->unit_price = (float) $item['price'];
            $items[] = $mpItem;
        }

        $preferenceRequest = new PreferenceRequest();
        $preferenceRequest->items = $items;
        $preferenceRequest->back_urls = [
            "success" => route('pago.exito'),
            "failure" => route('pago.fallo'),
            "pending" => route('pago.pendiente')
        ];
        $preferenceRequest->auto_return = "approved";

        $preference = $client->create($preferenceRequest);
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