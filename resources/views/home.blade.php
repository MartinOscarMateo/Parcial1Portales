@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

{{-- Carrusel banners --}}
<div id="bannerCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="{{ route('products') }}">
        <img src="{{ asset('images/banners/bannernuevo1.webp') }}" class="d-block w-100" alt="Banner 1">
      </a>
    </div>
    <div class="carousel-item">
      <a href="{{ route('products') }}">
        <img src="{{ asset('images/banners/bannernuevo2.webp') }}" class="d-block w-100" alt="Banner 2">
      </a>
    </div>
    <div class="carousel-item">
      <a href="{{ route('products') }}">
        <img src="{{ asset('images/banners/bannernuevo3.webp') }}" class="d-block w-100" alt="Banner 3">
      </a>
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
<section class="text-center py-5 bg-dark text-white">
  <div class="container">
    <h2 class="display-5 fw-bold mb-4 text-shadow">La Tienda Oficial de DC Shoes en Argentina</h2>
    <p class="lead mx-auto" style="max-width: 700px;">Descubrí lo último en zapatillas urbanas y de skate. Productos originales, estilo único y envío a todo el país. Elegí tu próximo par DC hoy mismo.</p>
    <a href="{{ route('products') }}" class="btn btn-primary btn-lg mt-3">Explorá ahora</a>
  </div>
</section>

{{-- Beneficios tienda --}}
<section class="py-5">
  <div class="container">
    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-3 shadow-sm h-100 transition-transform hover-scale">
          <i class="bi bi-truck fs-1 text-primary mb-3"></i>
          <h5 class="fw-bold">Envíos a todo el país</h5>
          <p class="text-muted">Hacemos llegar tus DC Shoes estés donde estés, rápido y seguro.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-3 shadow-sm h-100 transition-transform hover-scale">
          <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
          <h5 class="fw-bold">Calidad garantizada</h5>
          <p class="text-muted">Productos 100% originales con materiales duraderos y diseño único.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-3 shadow-sm h-100 transition-transform hover-scale">
          <i class="bi bi-headset fs-1 text-primary mb-3"></i>
          <h5 class="fw-bold">Atención personalizada</h5>
          <p class="text-muted">Te acompañamos en cada paso para que elijas lo mejor para vos.</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Video DC Shoes --}}
<section style="padding: 0; margin: 0; background: none;">
  <video autoplay muted loop playsinline style="width: 100%; height: auto; display: block; border: none;">
    <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
  </video>
</section>



<style>
  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }

  .transition-transform {
    transition: transform 0.3s ease;
  }

  .hover-scale:hover {
    transform: scale(1.05);
  }
</style>

{{-- Productos destacados --}}
<section class="container py-4">
  <h3 class="text-center mb-4">Para ti</h3>
  <div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
      <img src="{{ Storage::url('products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
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