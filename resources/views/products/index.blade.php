{{-- Esta vista muestra todos los productos en tarjetas, lo reciben desde el controlador y se listan en la pag :v  --}}

@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container">
    <h1 class="mb-4">Nuestros Productos</h1>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <div class="mt-auto">
                        <p class="fw-bold">${{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="#" class="btn btn-primary w-100">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
