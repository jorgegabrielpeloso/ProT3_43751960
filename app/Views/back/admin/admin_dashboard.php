<?= view('front/head_view', ['titulo' => $titulo]) ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/admin.css') ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="admin-wrapper">
  <aside class="sidebar">
    <h2 class="sidebar-title">Administración</h2>
    <ul class="sidebar-menu">
      <li><a href="#" class="active" onclick="showSection('usuarios-activos', this)"><i class="bi bi-people-fill"></i> Usuarios Activos</a></li>
      <li><a href="#" onclick="showSection('usuarios-baja', this)"><i class="bi bi-person-x-fill"></i> Usuarios Dados de Baja</a></li>
      <li><a href="#" onclick="showSection('productos', this)"><i class="bi bi-bag-fill"></i> Productos</a></li>
      <li><a href="#" onclick="showSection('productos-baja', this)"><i class="bi bi-bag-x-fill"></i> Productos Eliminados</a></li>
    </ul>
    <div class="sidebar-footer">
      <a href="<?= base_url('/logout') ?>" class="logout-link"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
    </div>
  </aside>

  <main class="main-content">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <section id="usuarios-activos" class="admin-section">
      <div class="section-header d-flex justify-content-between align-items-center">
        <h3><i class="bi bi-people-fill"></i> Usuarios Activos</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">
          <i class="bi bi-person-plus-fill"></i> Crear Usuario
        </button>
      </div>
      <table class="table text-center">
        <thead>
          <tr><th>Nombre</th><th>Usuario</th><th>Email</th><th>Perfil</th><th>Acciones</th></tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $u): ?>
            <tr>
              <td><?= esc($u['nombre']) ?></td>
              <td><?= esc($u['usuario']) ?></td>
              <td><?= esc($u['email']) ?></td>
              <td><?= $u['perfil_id'] == 1 ? 'Admin' : 'Usuario' ?></td>
              <td>
                <?php if ($u['id_usuario'] != session()->get('id_usuario')): ?>
                  <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal<?= $u['id_usuario'] ?>">
                    <i class="bi bi-pencil-fill"></i>
                  </button>
                  <a href="<?= base_url('/admin/usuarios/eliminar/'.$u['id_usuario']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                <?php else: ?> —
                <?php endif; ?>
              </td>
            </tr>

            <div class="modal fade" id="editarModal<?= $u['id_usuario'] ?>" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="<?= base_url('/admin/usuarios/actualizar') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $u['id_usuario'] ?>">
                    <div class="modal-header">
                      <h5 class="modal-title">Editar Usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" name="nombre" class="form-control mb-2" value="<?= esc($u['nombre']) ?>" required>
                      <input type="text" name="apellido" class="form-control mb-2" value="<?= esc($u['apellido']) ?>" required>
                      <input type="text" name="usuario" class="form-control mb-2" value="<?= esc($u['usuario']) ?>" required>
                      <input type="email" name="email" class="form-control mb-2" value="<?= esc($u['email']) ?>" required>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <section id="usuarios-baja" class="admin-section" style="display: none;">
      <h3><i class="bi bi-person-x-fill"></i> Usuarios Dados de Baja</h3>
      <table class="table text-center">
        <thead>
          <tr><th>Nombre</th><th>Usuario</th><th>Email</th><th>Reactivar</th></tr>
        </thead>
        <tbody>
          <?php foreach ($usuariosBaja as $u): ?>
            <tr>
              <td><?= esc($u['nombre']) ?></td>
              <td><?= esc($u['usuario']) ?></td>
              <td><?= esc($u['email']) ?></td>
              <td>
                <a href="<?= base_url('/admin/usuarios/reactivar/'.$u['id_usuario']) ?>" class="btn btn-success btn-sm">
                  <i class="bi bi-arrow-clockwise"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <!-- Secciones de productos irían aquí... -->

  </main>
</div>

<!-- Modal Crear Usuario -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('/admin/usuarios/guardar') ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
          <input type="text" name="apellido" class="form-control mb-2" placeholder="Apellido" required>
          <input type="text" name="usuario" class="form-control mb-2" placeholder="Usuario" required>
          <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
          <input type="password" name="pass" class="form-control mb-2" placeholder="Contraseña" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function showSection(id, el) {
    document.querySelectorAll('.admin-section').forEach(s => s.style.display = 'none');
    document.getElementById(id).style.display = 'block';
    document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
    el.classList.add('active');
  }
</script>
