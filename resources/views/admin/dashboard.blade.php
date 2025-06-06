@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Panel de Administración</h1>
    <div class="row">
        <div class="col-md-6 transition-transform hover-scale">
            {{-- Link real a gestión de publicaciones --}}
            <a href="{{ route('posts.index') }}" class="btn btn-light mb-3 d-flex flex-column align-items-center justify-content-center fs-5 shadow-sm border-0 transition-transform" style="height: 200px;">
                Gestionar Publicaciones del Foro
                <i class="bi bi-newspaper mt-2" style="font-size: 3rem;"></i>
            </a>
        </div>
        <div class="col-md-6 transition-transform hover-scale">
            {{-- Link a gestión de productos --}}
            <a href="{{ route('products.index') }}" class="btn btn-light mb-3 d-flex flex-column align-items-center justify-content-center fs-5 shadow-sm border-0 transition-transform" style="height: 200px;">
                Gestionar Productos
                <i class="bi bi-box-seam-fill mt-2" style="font-size: 3rem;"></i>
            </a>
        </div>
        <div class="col-md-6 transition-transform hover-scale">
            {{-- Link a gestión de usuarios --}}
            <a href="{{ route('users.index') }}" class="btn btn-light mb-3 d-flex flex-column align-items-center justify-content-center fs-5 shadow-sm border-0 transition-transform" style="height: 200px;">
                Gestionar Usuarios <i class="bi bi-person-fill-gear mt-2" style="font-size: 3rem;"></i>
            </a>
        </div>
        <div class="col-md-6 transition-transform hover-scale">
            {{-- Futuro link a gestión de ordenes --}}
            <a href="{{ route('orders.index') }}" class="btn btn-light mb-3 d-flex flex-column align-items-center justify-content-center fs-5 shadow-sm border-0 transition-transform" style="height: 200px;">
                Listado de Ordenes 
                <i class="bi bi-file-earmark-text-fill mt-2" style="font-size: 3rem;"></i>
            </a>
        </div>
    </div>
    
</div>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    .transition-transform {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .hover-scale:hover {
        transform: scale(1.015);
        opacity: 0.95;
    }
</style>
@endsection
