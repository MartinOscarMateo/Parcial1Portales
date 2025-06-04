@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<div class="container py-5 my-5">
    <h1 class="display-5 fw-bold text-center mb-4 text-primary text-shadow" data-aos="fade-up">¿Tenés dudas? ¡Hablemos!</h1>
    <p class="lead text-center mb-5 text-muted mx-auto" style="max-width: 700px;" data-aos="fade-up" data-aos-delay="100">Completá el formulario y nos pondremos en contacto con vos lo antes posible. Estamos para ayudarte a encontrar el par perfecto de DC Shoes.</p>

    <div class="row align-items-center g-5">
        <!-- Formulario -->
        <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
            <div class="card border-0 shadow-sm rounded-3 h-100 transition-transform hover-scale">
                <div class="card-body p-5">
                    <h4 class="fw-bold mb-4 d-flex align-items-center">
                        <i class="bi bi-envelope-fill fs-2 text-primary me-3"></i> Envíanos tu consulta
                    </h4>
                    <form>
                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-0"><i class="bi bi-person fs-5 text-muted"></i></span>
                                <input type="text" class="form-control shadow-sm border-0" id="nombre" placeholder="Tu nombre" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="correo" class="form-label fw-bold">Correo electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-0"><i class="bi bi-envelope fs-5 text-muted"></i></span>
                                <input type="email" class="form-control shadow-sm border-0" id="correo" placeholder="tu@email.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="mensaje" class="form-label fw-bold">Mensaje</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-0 align-items-start pt-2"><i class="bi bi-chat-text fs-5 text-muted"></i></span>
                                <textarea class="form-control shadow-sm border-0" id="mensaje" rows="5" placeholder="Escribí tu consulta aquí..." required></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-sm transition-transform hover-scale">Enviar mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('images/contacto2.webp') }}" class="img-fluid rounded-3 shadow-lg transition-transform hover-scale" alt="Imagen de contacto" style="max-height: 500px; object-fit: cover;">
        </div>
    </div>
</div>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    .transition-transform {
        transition: transform 0.3s ease;
    }
    .hover-scale:hover {
        transform: scale(1.02);
    }
    .card {
        border-radius: 10px;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        border-color: #86b7fe;
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
</style>
@endsection