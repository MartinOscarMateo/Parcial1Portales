@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Nuestros Productos</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 shadow-sm border-light rounded-3">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 250px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $product->name }}</h5>
                    <p class="card-text text-muted text-center flex-grow-1">{{ $product->description }}</p>
                    <div class="mt-auto">
                        <p class="fw-bold text-center text-primary">
                            ${{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('product.detail', $product->id) }}" class="btn btn-primary w-100 mt-2">Ver Producto</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
