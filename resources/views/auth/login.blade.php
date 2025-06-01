@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logoDcshoes.png') }}" alt="Logo DC Shoes" style="max-height: 100px;">
            <h4 class="mt-3">Iniciar sesión</h4>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
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

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Recordarme
                </label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">
                    Iniciar sesión
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a class="text-muted" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
