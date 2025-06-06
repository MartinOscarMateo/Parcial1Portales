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
        <div class="card-header">Crear nuevo producto</div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" rows="3" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
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
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <td>{{ $product->id }}</td>
                            <td>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="description" value="{{ $product->description }}" class="form-control" required>
                            </td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                                    <small class="text-muted">Dejar vacío para no cambiar</small>
                                    <img src="{{ asset('storage' . $product->image) }}" alt="{{ $product->description }}" class="img-thumbnail mb-2" style="max-width: 100px;">
                                </div>
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
        <div>
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
