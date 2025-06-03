@extends('layouts.app')

@section('title', 'Gestionar Publicaciones')

@section('content')
<div class="container">
    <h1 class="mb-4">Publicaciones del Foro</h1>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulario para nueva publicación --}}
    <div class="card mb-4">
        <div class="card-header">Crear nueva publicación</div>
        <div class="card-body">
            <form action="{{ route('products.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea name="content" rows="3" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
    </div>

    {{-- Listado de publicaciones --}}
    @if($products->isEmpty())
        <div class="alert alert-info">No hay publicaciones aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>{{ $product->id }}</td>
                            <td>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="description" value="{{ $product->description }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="name" value="{{ number_format($product->price, 0, ',', '.') }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="image" value="{{ $product->image }}" class="form-control" required>
                            </td>
                            <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                            <td class="d-flex gap-2">
                                <button type="submit" class="btn btn-sm btn-secondary">Actualizar</button>
                        </form>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que querés eliminar este Producto?')">Eliminar</button>
                        </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
