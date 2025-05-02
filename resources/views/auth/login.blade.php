<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" class="form-control" type="password" name="password" required>
            <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
            <label class="form-check-label" for="remember_me">Recordarme</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            @if (Route::has('password.request'))
                <a class="text-decoration-none small" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

            <button type="submit" class="btn btn-primary">
                Iniciar sesión
            </button>
        </div>

        <div class="text-center">
            <p class="small mb-0">¿Aún no te registraste?
                <a href="{{ route('register') }}">Registrate acá</a>
            </p>
        </div>
    </form>
</x-guest-layout>
