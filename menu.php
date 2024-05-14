<?php

  include('./services/conexao.php');

  // Exibir dados cadastrados
  $sql_select = "SELECT * FROM produtos";
  $stmt_select = $pdo->query($sql_select);
  $products = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<?php include './components/head.php'; ?>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <?php include './layouts/site/menu.php'; ?>
    <!-- end header section -->
  </div>

  <!-- food section -->
  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".fries">Fritas</li>
        <li data-filter=".pasta">Massa</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">
          <?php
            // Função para formatar o preço como moeda brasileira (BRL)
            function formatPrice($price) {
              return 'R$ ' . number_format($price, 2, ',', '.');
            }

            // Função para renderizar cada produto
            function renderProduct($produto) {
              ?>
              <div class="col-sm-6 col-lg-4 all <?php echo $produto['tipo']; ?>">
                <div class="box">
                  <div>
                    <div class="img-box">
                      <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['titulo']; ?>">
                    </div>
                    <div class="detail-box">
                      <h5><?php echo $produto['titulo']; ?></h5>
                      <p><?php echo $produto['descricao']; ?></p>
                      <div class="options">
                        <h6><?php echo formatPrice($produto['preco']); ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }

            // Renderizar cada produto usando array_map
            array_map('renderProduct', $products);
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end food section -->

  <?php include './components/footer.php'; ?>
</body>
</html>