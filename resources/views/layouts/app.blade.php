<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mi Tienda')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('images/logoDcshoes.png') }}" alt="Logo" class="img-fluid" style="max-height: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Productos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('forum') }}">Novedades</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('carrito.index') }}">Carrito</a></li>

        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              @if(auth()->user()->hasRol('admin'))
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Panel de Administración</a></li>
                <li><hr class="dropdown-divider"></li>
              @endif
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
              <li>
                <form action="{{ route('logout') }}" method="post" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registro</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<style>
  .navbar-nav .nav-link {
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
    color: #0a58ca;
    text-decoration: underline;
  }

  .navbar-toggler {
    border: none;
  }
</style>

<main>
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @yield('content')
  </div>
</main>

<footer class="bg-dark text-white py-4 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5 class="fw-bold">DC Shoes</h5>
        <p>En DC Shoes transformamos principiantes en leyendas. Nuestra marca representa a un montón de chicos que nunca han abandonado el parque de skate.</p>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold">Enlaces rápidos</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Inicio</a></li>
          <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Contacto</a></li>
          <li><a href="{{ route('products') }}" class="text-white text-decoration-none">Productos</a></li>
          <li><a href="{{ route('forum') }}" class="text-white text-decoration-none">Novedades</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold">Síguenos</h5>
        <a href="https://www.instagram.com/dcshoes_argentina/?hl=es" class="text-white me-3" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://x.com/dcshoes" class="text-white me-3" target="_blank"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/dcshoes.ar/?locale=es_LA" class="text-white" target="_blank"><i class="bi bi-facebook"></i></a>
      </div>
    </div>
    <div class="text-center mt-4">
      <p>&copy; {{ date('Y') }} DC Shoes. Todos los derechos reservados.</p>
      <p>Trabajo realizado por: Martínez Donde Santiago, Mateo Martín Oscar y Zambelli Dana Michelle</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
