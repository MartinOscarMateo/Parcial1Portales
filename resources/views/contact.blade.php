@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="container py-5">
  <h1 class="mb-4 text-center text-primary">¿Tenés dudas o querés hablar con nosotros?</h1>
  <p class="text-center mb-5 text-muted">Completá el siguiente formulario y nos pondremos en contacto con vos lo antes posible. Estamos para ayudarte a encontrar el par perfecto de DC Shoes.</p>

  <div class="row align-items-center">
    <div class="col-md-6 mb-4 mb-md-0">
      <form class="bg-light p-4 rounded shadow-sm">
        <div class="mb-3">
          <label for="nombre" class="form-label fw-bold">Nombre</label>
          <input type="text" class="form-control shadow-sm" id="nombre" placeholder="Tu nombre" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label fw-bold">Correo electrónico</label>
          <input type="email" class="form-control shadow-sm" id="correo" placeholder="tu@email.com" required>
        </div>
        <div class="mb-3">
          <label for="mensaje" class="form-label fw-bold">Mensaje</label>
          <textarea class="form-control shadow-sm" id="mensaje" rows="5" placeholder="Escribí tu consulta aquí..." required></textarea>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow">Enviar mensaje</button>
        </div>
      </form>
    </div>
    
    <div class="col-md-6 text-center">
      <img src="{{ asset('images/contacto.webp') }}" class="img-fluid rounded shadow-lg" alt="Imagen de contacto">
    </div>
  </div>
</div>

@endsection
