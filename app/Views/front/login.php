<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Iniciar sesión - Fútbol Retro Shop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/estilos.css">
</head>
<body class="d-flex flex-column min-vh-100">

<div class="container my-5 flex-fill">
    <h1 class="mb-4 text-center">Iniciar sesión</h1>

    <?php if(session()->getFlashdata('msg')): ?>
        <div class="alert alert-warning"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/login/auth') ?>" method="post" class="row g-3 justify-content-center">
        <div class="col-md-5">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="col-md-5">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
        </div>
    </form>
</div>

</body>
</html>
