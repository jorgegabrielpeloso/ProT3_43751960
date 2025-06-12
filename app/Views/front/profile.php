<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mi perfil - Fútbol Retro Shop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/estilos.css">
</head>
<body class="d-flex flex-column min-vh-100">

<div class="container my-5 flex-fill text-center">
    <h1>Bienvenido a tu Perfil</h1>
    <p>¡Hola, <?= session()->get('nombre').' '.session()->get('apellido') ?>! Has iniciado sesión con <?= session()->get('email') ?>.</p>
    <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Cerrar sesión</a>
</div>

</body>
</html>
