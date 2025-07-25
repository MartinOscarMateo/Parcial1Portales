@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container my-5 py-5">
    <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Nuestros Productos</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
        <div class="col">
            <article class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden transition-transform hover-scale">
                <img 
                    src="{{ Storage::url('products/' . $product->image) }}" 
                    class="card-img-top object-fit-cover transition-transform" 
                    alt="Imagen de {{ $product->name }}" 
                    style="height: 250px;"
                >
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <div class="mt-auto">
                        <p class="fw-bold text-center text-primary">
                            ${{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <a 
                            href="{{ route('product.detail', $product->id) }}" 
                            class="btn btn-primary w-100 mt-2 rounded-pill text-decoration-none" 
                            aria-label="Ver más sobre {{ $product->name }}"
                        >
                            Ver Producto
                        </a>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $products->links() }}
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
        transform: scale(1.05);
        opacity: 0.95;
    }
    .card {
        border-radius: 10px;
    }
    .card-img-top:hover {
        opacity: 0.9;
    }
</style>
@endsection