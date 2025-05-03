@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Panel de Administración</h1>
    <div class="row">
        <div class="col-md-4">
            {{-- Link real a crear publicación --}}
            <a href="{{ route('posts.create') }}" class="btn btn-primary w-100 mb-3">Gestionar Publicaciones del Foro</a>
        </div>
        <div class="col-md-4">
            {{-- Futuro link a gestión de productos --}}
            <a href="#" class="btn btn-outline-secondary w-100 mb-3 disabled">Gestionar Productos (próximamente)</a>
        </div>
        <div class="col-md-4">
            {{-- Futuro link a gestión de usuarios --}}
            <a href="#" class="btn btn-outline-secondary w-100 mb-3 disabled">Gestionar Usuarios (próximamente)</a>
        </div>
    </div>
</div>
@endsection
