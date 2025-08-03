@extends('layouts.app')

@section('title', 'Gestionar Ordenes')

@section('content')

    <div class="container mt-5">
        <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Listado de Ordenes</h1>
        
        {{-- Usamos la variable $ordenes que se pasa desde el controlador --}}
        @if($ordenes->isEmpty())
            <div class="text-center py-5 bg-light rounded-3 shadow-sm">
                <i class="bi bi-file-earmark-x-fill fs-1 text-muted mb-3"></i>
                <h3 class="fw-bold text-dark mb-3">¡Tu listado de ordenes está vacío!</h3>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">Parece que aún no se han realizado compras.</p>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg rounded-pill mt-3 text-decoration-none pe-4"><i class="bi bi-chevron-left"></i> Volver al panel</a>
            </div>
        @else
            {{-- Iteramos directamente sobre la colección de órdenes --}}
            @foreach ($ordenes as $orden)
            <div class="card mb-4">
                <div class="card-header">
                    {{-- Accedemos al usuario a través de la relación cargada --}}
                    <strong>Cliente: {{ $orden->user->name ?? 'Usuario Eliminado' }}</strong> |
                    <span>Orden #{{ $orden->id }} | Fecha: {{ $orden->created_at->format('d/m/Y H:i') }}</span>
                    <div class="float-end">
                        {{-- Formulario para eliminar la orden --}}
                        <form action="{{ route('orders.destroy', $orden->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta orden?')">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover mt-2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Talle</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Se ha corregido la relación a 'itemsOrden' --}}
                            @foreach ($orden->itemsOrden as $item)
                            <tr>
                                <td>{{ $item->product->id ?? 'N/A' }}</td>
                                <td>{{ $item->product->description ?? 'Producto Eliminado' }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            {{-- Calculamos el total de la orden sumando los subtotales de los ítems --}}
                            @php
                                $totalOrden = $orden->itemsOrden->sum(function ($item) {
                                    return $item->price * $item->quantity;
                                });
                            @endphp
                            <tr>
                                <td colspan="5" class="text-end fw-bold">Total Orden:</td>
                                <td><strong>${{ number_format($totalOrden, 0, ',', '.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <style>
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .bi-x-lg:hover {
            color: red;
        }
    </style>

@endsection
