@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

{{-- Carrusel banners --}}
<div id="bannerCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/banners/banner1.webp') }}" class="d-block w-100" alt="Banner 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/banners/banner2.webp') }}" class="d-block w-100" alt="Banner 2">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

{{-- Secc info --}}
<section class="text-center py-5">
  <div class="container">
    <h2 class="mb-3">La Tienda Oficial de DC Shoes en Argentina</h2>
    <p>Descubrí lo último en zapatillas urbanas y de skate. Productos originales, estilo único y envío a todo el país. Elegí tu próximo par DC hoy mismo.</p>
  </div>
</section>

{{-- Beneficios tienda --}}
<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4">
        <h5>Envíos a todo el país</h5>
        <p>Hacemos llegar tus DC Shoes estés donde estés, rápido y seguro.</p>
      </div>
      <div class="col-md-4">
        <h5>Calidad garantizada</h5>
        <p>Productos 100% originales con materiales duraderos y diseño único.</p>
      </div>
      <div class="col-md-4">
        <h5>Atención personalizada</h5>
        <p>Te acompañamos en cada paso para que elijas lo mejor para vos.</p>
      </div>
    </div>
  </div>
</section>

{{-- Productos destacados --}}
<section class="container py-4">
  <h3 class="text-center mb-4">Para ti</h3>
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
          <div class="card-body text-center">
            <h5 class="card-title">{{ $product->description }}</h5>
            <p class="card-text fw-bold">${{ number_format($product->price, 0, ',', '.') }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="text-center mt-4">
    <a href="{{ route('products') }}" class="btn btn-primary btn-lg">Ver todos los productos</a>
  </div>
</section>

@endsection
