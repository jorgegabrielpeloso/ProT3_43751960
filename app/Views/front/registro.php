<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrate - Fútbol Retro Shop</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/estilos.css">
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container my-5 flex-fill">
    <h1 class="mb-4 text-center">Crear Cuenta</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success" id="success-alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if(isset($validation)): ?>
        <div class="alert alert-warning"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/registro/store') ?>" method="post" class="row g-3">
        <div class="col-md-6">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>
        <div class="col-12">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label>Confirmar contraseña</label>
            <input type="password" name="confirmar" class="form-control" required>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-success">Registrarme</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if(alert) alert.style.display = 'none';
}, 2000);
</script>
</body>
</html>
