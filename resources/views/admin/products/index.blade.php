@extends('layouts.app')

@section('title', 'Gestionar Publicaciones')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Listado de Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                <th>Imágenes</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <p>{{ $product->id }}</p>
                </td>
                <td>
                    <p>{{ $product->name }}</p>
                </td>
                <td>
                    <p>{{ $product->price }}</p>
                </td>
                <td>
                    <p>{{ $product->description }}</p>
                </td>

                <td>
                    @if($product->image)
                    <div>
                        <small class="text-muted">Principal</small><br>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen principal" class="img-thumbnail mb-2" style="max-width: 100px;">
                    </div>
                    @endif
                    @if($product->extra_image_1)
                    <div>
                        <small class="text-muted">Extra 1</small><br>
                        <img src="{{ asset('storage/' . $product->extra_image_1) }}" alt="Imagen Extra 1" class="img-thumbnail mb-2" style="max-width: 100px;">
                    </div>
                    @endif
                    @if($product->extra_image_2)
                    <div>
                        <small class="text-muted">Extra 2</small><br>
                        <img src="{{ asset('storage/' . $product->extra_image_2) }}" alt="Imagen Extra 2" class="img-thumbnail mb-2" style="max-width: 100px;">
                    </div>
                    @endif
                </td>
                
                <td>
                    <p>{{ $product->created_at->format('d/m/Y H:i') }}</p>
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que querés eliminar este Producto?')">Eliminar</button>
                        </form>
                    </div>
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