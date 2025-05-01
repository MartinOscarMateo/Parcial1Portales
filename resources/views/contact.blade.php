@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="container py-5">
  <h1 class="mb-4 text-center">¿Tenés dudas o querés hablar con nosotros?</h1>
  <p class="text-center mb-5">Completá el siguiente formulario y nos pondremos en contacto con vos lo antes posible. Estamos para ayudarte a encontrar el par perfecto de DC Shoes.</p>

  <div class="row align-items-center">
    <div class="col-md-6 mb-4 mb-md-0">
      <form>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="correo" placeholder="tu@email.com" required>
        </div>
        <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje</label>
          <textarea class="form-control" id="mensaje" rows="5" placeholder="Escribí tu consulta aquí..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar mensaje</button>
      </form>
    </div>
    
    <div class="col-md-6 text-center">
      {{-- Imagen de contacto - reemplazá la imagen si querés --}}
      <img src="{{ asset('images/contacto.webp') }}" class="img-fluid rounded shadow-sm" alt="Imagen de contacto">
    </div>
  </div>
</div>

@endsection
