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
        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));

        // Crear ítem
        $item = new PreferenceItem();
        $item->title = "Producto de prueba";
        $item->quantity = 1;
        $item->unit_price = 100.00;

        $preferenceRequest = new PreferenceRequest();
        $preferenceRequest->items = [$item];
        $preferenceRequest->back_urls = [
            "success" => route('pago.exito'),
            "failure" => route('pago.fallo'),
            "pending" => route('pago.pendiente')
        ];
        $preferenceRequest->auto_return = "approved";

        $client = new PreferenceClient();
        $preference = $client->create($preferenceRequest);

        return redirect($preference->init_point);
    }

    public function exito() { return "¡Pago exitoso!"; }
    public function fallo() { return "El pago falló."; }
    public function pendiente() { return "El pago está pendiente."; }
}