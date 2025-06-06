@extends('layouts.app')

@section('title', 'Gestionar Ordenes')

@section('content')

    <div class="container mt-5">
        <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Listado de Ordenes</h1>
        {{-- Listado de ordenes separado por usario --}}
        @foreach ($users as $user) 
        <div class="card mb-4">
                <div class="card-header">{{ $user->name }}</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Talle</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->ordenes as $orden)
                                @foreach ($orden->itemOrdenes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product->description }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                        <td>{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            <tr>
                                <td colspan="4">Total Orden:</td>
                                {{-- Total de las ordenes divididas por usuario --}}
                                <td colspan="2"><strong> {{ number_format($user->ordenes->flatMap->itemOrdenes->sum(function($item) { return $item->price * $item->quantity; }), 0, ',', '.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

    <style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    </style>

@endsection
