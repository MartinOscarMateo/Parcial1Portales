@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="container my-5 py-5">
    <h1 class="display-5 fw-bold text-center mb-5 text-shadow text-primary" data-aos="fade-up">Editar Perfil</h1>

    <div class="row justify-content-center g-4">
        <div class="col-md-8 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 shadow-sm h-100 transition-transform hover-scale">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-person-circle fs-2 text-primary me-3"></i>
                        <h4 class="card-title mb-0 fw-bold">Información del perfil</h4>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 shadow-sm h-100 transition-transform hover-scale">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-lock-fill fs-2 text-primary me-3"></i>
                        <h4 class="card-title mb-0 fw-bold">Actualizar contraseña</h4>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card border-0 border-start border-5 border-danger shadow-sm h-100 transition-transform hover-scale">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-trash-fill fs-2 text-danger me-3"></i>
                        <h4 class="card-title mb-0 fw-bold text-danger">Eliminar cuenta</h4>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
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
    .border-start {
        border-left: 5px solid;
    }
</style>
@endsection