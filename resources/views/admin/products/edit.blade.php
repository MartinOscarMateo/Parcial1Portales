@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
{{-- Formulario para editar Producto --}}
<div class="card mb-4">
    <div class="card-header">Editar Producto</div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control @error('price') is-invalid @enderror" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" required>{{ $product->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <div class="d-block mt-2">
                    @if($product->image)
                    <img src="{{ asset('storage' . $product->image) }}" alt="{{ $product->description }}" class="img-thumbnail mb-2" style="max-width: 100px;">
                    @endif
                    <small class="text-muted ms-3">(Dejar vacío para no cambiar)</small>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>

@endsection
