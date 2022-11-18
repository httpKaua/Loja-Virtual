<?php
include 'header.php';
include 'veiculos.class.php';
session_start();
?>
<nav>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://tcarmultimarcas.com.br/wp-content/uploads/2022/10/4afd8a5b97df6f27488b.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
</nav>

<link rel="stylesheet" href="./css/index.css">
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-dark text-center my-3">
        <h1>Produtos</h1>
      </div>
    </div>
    <div class="row">
      <?php foreach ($carros as $key => $value) { ?>
        <div class="col-sm-4">
          <div class="card">
            <img src="<?php echo $value->img ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <form action="carrinho.php" method="post">
                <h5 class="card-title text-war"><?php echo $value->modelo ?></h5>
                <p class="list-price"><?php echo 'R$ ' . number_format($value->preco, 2, ',', '.') ?></p>
                <ul class="slider-grid__info list-unstyled tmpl-slider-grid__info features_list">
                  <li><i class="bi bi-diagram-3-fill"></i><?php echo ' ' . number_format($value->quilom, 3, '.', '.') ?></i></li>
                  <li><i class="bi bi-diagram-3-fill"></i></i><?php echo ' ' . $value->cambio ?></li>
                  <li><i class="bi bi-calendar3"> </i><?php echo ' ' . $value->ano ?></li>
                  <i class="bi bi-fuel-pump"></i><?php echo ' ' . $value->comb ?></li>
                </ul>
                <input type="hidden" name="modelo" value="<?php echo $value->modelo ?>">
                <input type="hidden" name="preco" value="<?php echo $value->preco ?>">
                <input type="hidden" name="imagem" value="<?php echo $value->img?>">
                <input type="hidden" name="add" value="<?php echo $key ?>">
                <input type="submit" class="btn btn-primary" value="Adicionar ao Carrinho" name="send">
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php
include 'footer.php';
?>