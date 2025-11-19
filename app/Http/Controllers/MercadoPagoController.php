<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Resources\PreferenceRequest;
use MercadoPago\Resources\PreferenceItem;
use Illuminate\Support\Facades\Auth;

class MercadoPagoController extends Controller
{
    public function pagar()
    {
        try {
            $accessToken = env('MERCADO_PAGO_ACCESS_TOKEN');

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
                $items[] = [
                    "title"      => $item['name'],
                    "quantity"   => (int)$item['quantity'],
                    "unit_price" => (float)$item['price'],
                ];
            }

            $preference = $client->create([
                "items" => $items,
                "statement_descriptor"  => "Paso a Paso",
                "external_reference"    => "Pedido de " . (Auth::user()->name ?? 'cliente'),
            ]);

            return redirect($preference->init_point);

        } catch (\MercadoPago\Exceptions\MPApiException $e) {

            $response = $e->getApiResponse();

            dd([
                'status' => $response->getStatusCode(),
                'body' => $response->getContent(),
            ]);
        }
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