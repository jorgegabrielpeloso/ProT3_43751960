<?= view('front/head_view', ['titulo' => 'Mi Perfil']) ?>
<?= view('front/navbar_view') ?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <?php if (!empty($usuario['avatar'])): ?>
                <img src="<?= base_url('uploads/' . $usuario['avatar']) ?>" alt="Avatar" class="img-fluid rounded-circle mb-3" style="width: 140px; height: 140px; object-fit: cover;">
            <?php endif; ?>
            <h3><?= esc($usuario['nombre']) ?></h3>
            <p class="text-muted">Usuario registrado</p>
            <p>Miembro desde <?= date('Y', strtotime($usuario['created_at'])) ?></p>
        </div>

        <div class="col-md-8">
            <h4>Editar Perfil</h4>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('/profile/update') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="<?= esc($usuario['apellido']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= esc($usuario['email']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" value="<?= esc($usuario['usuario']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Contraseña nueva</label>
                    <input type="password" name="pass" class="form-control" placeholder="Dejar en blanco si no se cambia">
                </div>
                <div class="mb-3">
                    <label>Avatar (solo JPG o PNG, máx 5MB)</label>
                    <input type="file" name="avatar" class="form-control">
                    <?php if (!empty($usuario['avatar'])): ?>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="eliminar_avatar" value="1" id="eliminar_avatar">
                            <label class="form-check-label" for="eliminar_avatar">
                                Eliminar foto de perfil actual
                            </label>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('/') ?>" class="btn btn-outline-primary">Continuar comprando</a>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= view('front/footer_view') ?>
