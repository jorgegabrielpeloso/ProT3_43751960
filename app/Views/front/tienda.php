<div class="container my-5">
  <h2 class="text-center mb-4">Todos nuestros productos</h2>
  <div class="row">
    <?php foreach ($productos as $producto): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="<?= base_url('public/uploads/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
          <div class="card-body text-center">
            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
            <p class="card-text"><?= esc($producto['descripcion']) ?></p>
            <p class="fw-bold">$<?= number_format($producto['precio'], 2) ?></p>
            <button class="btn btn-outline-success btn-sm">
              <i class="bi bi-cart-plus"></i> Agregar
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
