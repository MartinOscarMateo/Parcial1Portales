@extends('layouts.app')

@section('title', 'Checkout - Confirmar Compra')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Confirmar Compra</h1>

    @if(is_array($cart) && count($cart) > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Talle</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;">
                        {{ $item['name'] }}
                    </td>
                    <td>{{ $item['size'] }}</td>
                    <td>${{ number_format($item['price'], 2, ',', '.') }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h4 class="text-end">Total a Pagar: ${{ number_format($totalPrice, 2, ',', '.') }}</h4>

    <form action="{{ route('carrito.finalizar') }}" method="POST" class="text-end">
        @csrf
        <button type="submit" class="btn btn-success btn-lg mt-3">
            Confirmar Compra
        </button>
    </form>

    @else
    <p class="text-center">Tu carrito está vacío. <a href="{{ route('products') }}">Ver productos</a></p>
    @endif
</div>
@endsection
