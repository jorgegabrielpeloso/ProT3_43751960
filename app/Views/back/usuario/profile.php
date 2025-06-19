<?php
helper(['form']);
?>
<div class="container mt-5">
    <h2><?= esc($titulo) ?></h2>
    <p class="mb-4">Bienvenido a tu panel de usuario.</p>

    <div class="d-grid gap-2 col-md-4 col-sm-6">
        <a href="<?= base_url('/editar-perfil') ?>" class="btn btn-outline-primary">Editar perfil</a>
        <a href="<?= base_url('/cambiar-contrasena') ?>" class="btn btn-outline-secondary">Cambiar contraseña</a>
        <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger">Cerrar sesión</a>
    </div>
</div>
