<?php
helper(['form']);
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2><?= esc($titulo) ?></h2>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/login/auth') ?>" method="post">
                <div class="mb-3">
                    <label>Usuario o Email</label>
                    <input type="text" name="usuario" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>
