<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Bienvenido</h2>
            <p class="text-muted">Iniciá sesión para continuar</p>
        </div>

        {{ $slot }}
    </div>

</body>
</html>
