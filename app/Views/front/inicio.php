<div class="container py-3">
  <div class="title h1 text-center">Colección Destacada</div>

  <!-- Card principal con carrusel -->
  <div class="card">
    <div class="row g-0">
      <div class="col-md-7 p-3 d-flex flex-column justify-content-center">
        <div class="card-block">
          <h4 class="card-title">Camisetas Retro Exclusivas</h4>
          <p class="card-text">
            Descubrí nuestra colección de camisetas vintage y reviví los momentos históricos de tus equipos favoritos.
          </p>
          <p class="card-text">
            Modelos únicos y auténticos, para coleccionar o regalar. ¡Sumate a la pasión retro!
          </p>
          <a href="#" class="btn btn-primary mt-2">Ver más</a>
        </div>
      </div>
      <div class="col-md-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/assets/img/zidane.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="public/assets/img/ronaldo.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="public/assets/img/maradona.webp" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Sección de Productos Destacados -->

<div class="container mt-5">
  <h2 class="text-center mb-4">Productos Destacados</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- CARD 1 -->
    <div class="col">
      <div class="card h-100">
        <img src="<?= base_url('public/assets/img/argentina.png') ?>" class="card-img-top" alt="Camiseta Argentina 90s">
        <div class="card-body">
          <h5 class="card-title">Camiseta Clásica 90's</h5>
          <p class="card-text">Revive los mejores momentos del fútbol con esta camiseta icónica de los años 90.</p>
          <p><strong>$59000.99</strong></p>
        </div>
        <div class="card-footer text-center">
          <button class="btn btn-sm btn-success">
            <i class="bi bi-cart-plus"></i> Agregar
          </button>
        </div>
      </div>
    </div>

    <!-- CARD 2 -->
    <div class="col">
      <div class="card h-100">
        <img src="<?= base_url('public/assets/img/francia.jpg') ?>" class="card-img-top" alt="Camiseta Francia Zidane">
        <div class="card-body">
          <h5 class="card-title">Camiseta Clásica 90's</h5>
          <p class="card-text">Revive los mejores momentos del fútbol con esta camiseta icónica de los años 90.</p>
          <p><strong>$59000.99</strong></p>
        </div>
        <div class="card-footer text-center">
          <button class="btn btn-sm btn-success">
            <i class="bi bi-cart-plus"></i> Agregar
          </button>
        </div>
      </div>
    </div>

    <!-- CARD 3 -->
    <div class="col">
      <div class="card h-100">
        <img src="<?= base_url('public/assets/img/brazil.jpg') ?>" class="card-img-top" alt="Camiseta Brasil Ronaldo">
        <div class="card-body">
          <h5 class="card-title">Camiseta Clásica 90's</h5>
          <p class="card-text">Revive los mejores momentos del fútbol con esta camiseta icónica de los años 90.</p>
          <p><strong>$59000.99</strong></p>
        </div>
        <div class="card-footer text-center">
          <button class="btn btn-sm btn-success">
            <i class="bi bi-cart-plus"></i> Agregar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- VER MÁS -->
  <div class="text-center mt-4">
    <a href="<?= base_url('/tienda') ?>" class="btn btn-outline-primary">
      Ver más productos
    </a>
  </div>
</div>
