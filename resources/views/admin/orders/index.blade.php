@extends('layouts.app')

@section('title', 'Gestionar Ordenes')

@section('content')

    <div class="container mt-5">
        <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Listado de Ordenes</h1>
        @if($ItemOrders->isEmpty())
            <div class="text-center py-5 bg-light rounded-3 shadow-sm">
                <i class="bi bi-file-earmark-x-fill fs-1 text-muted mb-3"></i>
                <h3 class="fw-bold text-dark mb-3">¡Tu listado de ordenes está vacío!</h3>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">Parece que aún no se han añadido productos a tu listado de órdenes.</p>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg rounded-pill mt-3 text-decoration-none pe-4"><i class="bi bi-chevron-left"></i> Volver al panel</a>
            </div>
        @else
        @foreach ($users as $user)
        <div class="card mb-4">
            <div class="card-header">
                <strong>{{ $user->name }}</strong>
            </div>
            <div class="card-body">
                @foreach ($user->ordenes as $orden)
                <div class="mb-3 border rounded p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Orden #{{ $orden->id }} | Fecha: {{ $orden->created_at->format('d/m/Y H:i') }}</span>
                        <form action="{{ route('orders.destroy', $orden->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta orden?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>
                    <table class="table table-bordered table-hover mt-2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Talle</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orden->itemOrdenes as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product->description }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                {{-- <td>{{ $orden->created_at->format('d/m/Y H:i') }}</td> --}}
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Total Orden:</td>
                                {{-- Total de las ordenes divididas por usuario --}}
                                <td colspan="2"><strong>${{ number_format($orderTotals[$orden->id] ?? 0, 0, ',', '.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
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
