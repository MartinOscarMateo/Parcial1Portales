<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mi Tienda')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Poppins', sans-serif; background-color: #f8f9fa;">

  <nav class="navbar navbar-expand-lg bg-gradient shadow-lg" style="background: linear-gradient(90deg, #1a1a1a, #343a40);">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/logoDcshoes.png') }}" alt="Logo" class="img-fluid" style="max-height: 50px; transition: transform 0.3s;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link text-dark hover-effect" href="{{ route('products') }}">Productos</a></li>
          <li class="nav-item"><a class="nav-link text-dark hover-effect" href="{{ route('contact') }}">Contacto</a></li>
          <li class="nav-item"><a class="nav-link text-dark hover-effect" href="{{ route('forum') }}">Novedades</a></li>
          <li class="nav-item"><a class="nav-link text-dark hover-effect" href="{{ route('carrito.index') }}">Carrito <i class="bi bi-cart"></i></a></li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark hover-effect" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" style="background: #ffffff !important; border: none;" aria-labelledby="userDropdown">
              @if(auth()->user()->hasRol('admin'))
              <li><a class="dropdown-item text-dark hover-effect" href="{{ route('admin.dashboard') }}">Panel de Administración</a></li>
              <li>
                <hr class="dropdown-divider bg-light">
              </li>
              @endif
              <li><a class="dropdown-item text-dark hover-effect" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
              <li>
                <form action="{{ route('logout') }}" method="post" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item text-dark hover-effect">Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item"><a class="nav-link text-dark hover-effect" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link text-dark btn btn-outline-dark ms-2 hover-effect" href="{{ route('register') }}">Registro</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <style>
    .navbar {
      padding: 1rem 0;
      transition: all 0.3s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.1);
    }

    .navbar-nav .nav-link,
    .dropdown-item {
      font-weight: 500;
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }

    .hover-effect:hover {
      color: #0d6efd !important;
      transform: translateY(-2px);
    }

    .dropdown-menu {
      border-radius: 10px;
    }

    .dropdown-item:hover {
      background: #ffffff !important; 
      color: #0d6efd !important; 
    }

    main {
      min-height: 65vh;
      padding: 2rem 0;
      background: linear-gradient(180deg, #f8f9fa, #e9ecef);
    }

    .alert {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .hover-icon:hover {
      color: #0d6efd !important;
      transform: scale(1.2);
      transition: all 0.3s ease;
    }
  </style>

  <main>
    <div class="container">
      @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @yield('content')
    </div>
  </main>

  <footer class="bg-gradient py-5 mt-5" style="background: linear-gradient(90deg, #1a1a1a, #343a40);">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="fw-bold text-uppercase text-dark">DC Shoes</h5>
          <p class="text-dark">En DC Shoes transformamos principiantes en leyendas. Nuestra marca representa a un montón de chicos que nunca han abandonado el parque de skate.</p>
        </div>
        <div class="col-md-4">
          <h5 class="fw-bold text-uppercase text-dark">Enlaces rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="text-dark text-decoration-none hover-effect">Inicio</a></li>
            <li><a href="{{ route('contact') }}" class="text-dark text-decoration-none hover-effect">Contacto</a></li>
            <li><a href="{{ route('products') }}" class="text-dark text-decoration-none hover-effect">Productos</a></li>
            <li><a href="{{ route('forum') }}" class="text-dark text-decoration-none hover-effect">Novedades</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 class="fw-bold text-uppercase text-dark">Síguenos</h5>
          <a href="https://www.instagram.com/dcshoes.argentina/?hl=es" class="text-dark me-3 hover-icon" target="_blank"><i class="bi bi-instagram fs-4"></i></a>
          <a href="https://x.com/dcshoes" class="text-dark me-3 hover-icon" target="_blank"><i class="bi bi-twitter fs-4"></i></a>
          <a href="https://www.facebook.com/dcshoes.ar/?locale=es_LA" class="text-dark hover-icon" target="_blank"><i class="bi bi-facebook fs-4"></i></a>
        </div>
      </div>
      <div class="text-center mt-4">
        <p class="mb-1 text-dark">© {{ date('Y') }} DC Shoes. Todos los derechos reservados.</p>
        <p class="text-dark">Trabajo realizado por: Martínez Donde Santiago, Mateo Martín Oscar y Zambelli Dana Michelle</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>