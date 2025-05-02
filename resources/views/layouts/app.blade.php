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
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products') }}">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('forum') }}">Novedades</a>
        </li>
         <li class="nav-item "> {{-- d-flex align-items-center --}}
          @if (auth()->check())
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link btn btn-link p-0 text-decoration-none">
              Logout({{ Auth::user()->name }})
            </button>
          </form>
            <div class="dropdown">
              <button class="btn dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </button>
              <ul class="dropdown-menu dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
                <li>
                  <form class="dropdown-item" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link p-0 text-decoration-none text-black">
                      Logout
                    </button>
                  </form>
                </li>
                @if(auth()->check() && auth()->user()->hasRol('admin'))
                  <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Administrar</a></li>
                @endif
              </ul>
              
            </div>
          @else
          <a class="nav-link" href="{{ url('/login') }}">Login</a>
          @endif
        </li>
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
      @yield('content')
    </div>
  </main>

  <footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="fw-bold">DC Shoes</h5>
          <p>En DC Shoes transformamos principiantes en leyendas, nuestra marca representa a un montón de chicos que nunca han abandonado el parque de skate. </p>
        </div>
        <div class="col-md-4">
          <h5 class="fw-bold">Enlaces rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Inicio</a></li>
            <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Contacto</a></li>
            <li><a href="{{ route('products') }}" class="text-white text-decoration-none">Productos</a></li>
            <li><a href="{{ route('forum') }}" class="text-white text-decoration-none">Novedades</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 class="fw-bold">Síguenos</h5>
          <div>
            <a href="https://www.instagram.com/dcshoes_argentina/?hl=es" class="text-white me-3" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://x.com/dcshoes" class="text-white me-3" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/dcshoes.ar/?locale=es_LA" class="text-white" target="_blank"><i class="bi bi-facebook"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <p>&copy; {{ date('Y') }} DC Shoes. Todos los derechos reservados.</p>
      <p>Trabajo realizado por: Martínez Donde Santiago, Mateo Martín Oscar y Zambelli Dana Michelle</p>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>