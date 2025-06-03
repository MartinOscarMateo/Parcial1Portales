@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Carrito de Compras</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(is_array($cart) && count($cart) > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Talle</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $key => $item)
                <tr>
                    <td>
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;">
                        {{ $item['name'] }}
                    </td>
                    <td>{{ $item['size'] }}</td>
                    <td>${{ number_format($item['price'], 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('carrito.updateQuantity', $key) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control" style="width: 60px;">
                            <button type="submit" class="btn btn-secondary btn-sm mt-2">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('carrito.remove', $key) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h4>Total: ${{ number_format($totalPrice, 2, ',', '.') }}</h4>
        <div>
            <a href="{{ route('products') }}" class="btn btn-secondary">Seguir comprando</a>
            <a href="{{ route('carrito.checkout') }}" class="btn btn-primary">Finalizar compra</a>
            <form action="{{ route('carrito.clear') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Vaciar Carrito</button>
            </form>
        </div>
    </div>
    @else
    <p class="text-center">Tu carrito está vacio <a href="{{ route('products') }}">Ver productos</a></p>
    @endif
</div>
@endsection
