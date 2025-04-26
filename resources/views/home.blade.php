@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<section class="bg-primary text-white text-center p-5">
  <div class="container">
    <h1 class="display-4">¡Bienvenido a Mi Tienda de Ropa!</h1>
    <p class="lead">Encontrá las últimas tendencias de moda a los mejores precios.</p>
    <a href="/products" class="btn btn-light btn-lg mt-3">Ver productos</a>
  </div>
</section>
@endsection
