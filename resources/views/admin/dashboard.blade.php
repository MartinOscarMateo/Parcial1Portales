@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Panel de Administración</h1>
    <div class="row">
        <div class="col-md-4">
            {{-- Link real a gestión de publicaciones --}}
            <a href="{{ route('posts.index') }}" class="btn btn-primary w-100 mb-3">Gestionar Publicaciones del Foro</a>
        </div>
        <div class="col-md-4">
            {{-- Futuro link a gestión de productos --}}
            <a href="{{ route('products.index') }}" class="btn btn-primary w-100 mb-3">Gestionar Productos</a>
        </div>
        <div class="col-md-4">
            {{-- Futuro link a gestión de usuarios --}}
            <a href="{{ route('users.index') }}" class="btn btn-primary w-100 mb-3">Gestionar Usuarios</a>
        </div>
    </div>
</div>
@endsection
