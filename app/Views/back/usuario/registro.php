<?php
helper(['form']);
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2><?= esc($titulo) ?></h2>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/usuarios/validar') ?>" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= old('nombre') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="<?= old('apellido') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Usuario</label>
                        <input type="text" name="usuario" class="form-control" value="<?= old('usuario') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= old('email') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label>Contraseña</label>
                        <input type="password" name="pass" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
        </div>
    </div>
</div>
