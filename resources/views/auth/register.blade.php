@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logoDcshoes.png') }}" alt="Logo DC Shoes" style="max-height: 100px;">
            <h4 class="mt-3">Crear una cuenta</h4>
            <p class="text-muted">Registrate para comenzar</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre completo</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" class="form-control"
                       name="password_confirmation" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">
                    Registrarse
                </button>
            </div>

            <div class="text-center mt-3">
                <a class="text-muted" href="{{ route('login') }}">
                    ¿Ya estás registrado?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
