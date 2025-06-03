@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Editar Perfil</h1>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Información del perfil</h4>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Actualizar contraseña</h4>
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    <h4 class="card-title mb-3 text-danger">Eliminar cuenta</h4>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
