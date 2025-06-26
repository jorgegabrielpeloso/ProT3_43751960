<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('public/assets/img/logo.png') ?>" alt="Logo" height="30">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/quienes_somos') ?>">Quiénes Somos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/acerca_de') ?>">Acerca de</a></li>
            </ul>

            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php if (session()->get('id_usuario')) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('/profile') ?>">Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('/logout') ?>">Cerrar sesión</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('/registro') ?>">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= base_url('/login') ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
