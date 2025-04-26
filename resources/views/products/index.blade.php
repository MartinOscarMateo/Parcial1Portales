<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Mi Tienda</title>
    <!-- Bootstrap 5 vía CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Mi Tienda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/products">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum">Novedades</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h1 class="mb-4 text-center">Nuestros Productos</h1>
  <div class="row">

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="https://via.placeholder.com/400x300?text=Remera" class="card-img-top" alt="Remera">
        <div class="card-body">
          <h5 class="card-title">Remera Básica</h5>
          <p class="card-text">Remera de algodón 100%. Ideal para todos los días.</p>
          <p class="card-text"><strong>$4.500</strong></p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="https://via.placeholder.com/400x300?text=Campera" class="card-img-top" alt="Campera">
        <div class="card-body">
          <h5 class="card-title">Campera de Jean</h5>
          <p class="card-text">Campera clásica de jean azul, resistente y moderna.</p>
          <p class="card-text"><strong>$12.000</strong></p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="https://via.placeholder.com/400x300?text=Jean" class="card-img-top" alt="Jean">
        <div class="card-body">
          <h5 class="card-title">Jean Slim Fit</h5>
          <p class="card-text">Jean cómodo, con calce ajustado. Perfecto para salir.</p>
          <p class="card-text"><strong>$8.900</strong></p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
