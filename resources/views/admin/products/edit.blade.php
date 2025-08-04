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

            {{-- Imagen principal --}}
            <div class="mb-3">
                <label for="image" class="form-label">Imagen principal</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                @if($product->image)
                    <div class="mt-2">
                        <img src="{{ Storage::url($product->image) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 100px;">
                    </div>
                    <small class="text-muted">(Dejar vacío para no cambiar)</small>
                @endif
            </div>

            {{-- Imagen Extra 1 --}}
            <div class="mb-3">
                <label for="extra_image_1" class="form-label">Imagen Extra 1</label>
                <input type="file" id="extra_image_1" name="extra_image_1" class="form-control" accept="image/*">
                @if($product->extra_image_1)
                    <div class="mt-2">
                        <img src="{{ Storage::url($product->extra_image_1) }}" alt="Imagen Extra 1" class="img-thumbnail" style="max-width: 100px;">
                    </div>
                    <small class="text-muted">(Dejar vacío para no cambiar)</small>
                @endif
            </div>

            {{-- Imagen Extra 2 --}}
            <div class="mb-3">
                <label for="extra_image_2" class="form-label">Imagen Extra 2</label>
                <input type="file" id="extra_image_2" name="extra_image_2" class="form-control" accept="image/*">
                @if($product->extra_image_2)
                    <div class="mt-2">
                        <img src="{{ Storage::url($product->extra_image_2) }}" alt="Imagen Extra 2" class="img-thumbnail" style="max-width: 100px;">
                    </div>
                    <small class="text-muted">(Dejar vacío para no cambiar)</small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection