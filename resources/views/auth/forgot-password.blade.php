@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logoDcshoes.png') }}" alt="Logo DC Shoes" style="max-height: 100px;">
            <h4 class="mt-3">¿Olvidaste tu contraseña?</h4>
            <p class="text-muted">
                Ingresá tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
            </p>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">
                    Enviar enlace de recuperación
                </button>
            </div>

            <div class="text-center mt-3">
                <a class="text-muted" href="{{ route('login') }}">
                    Volver al inicio de sesión
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
