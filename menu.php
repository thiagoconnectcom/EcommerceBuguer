<?php
  include('./services/conexao.php');
  include('./models/Menu.php');
  include('./controllers/MenuController.php');

  // Criando uma instância do controlador MenuController
  $menuController = new MenuController(new Menu($pdo));

  // Exibir dados cadastrados
  $menus = $menuController->getAllMenus();
?>


<!DOCTYPE html>
<html>

  <?php include './includes/head.php'; ?>

  <body class="sub_page">
    <div class="hero_area">
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
              // Função para renderizar cada menus
              function renderProduct($menus) {
                ?>
                <div class="col-sm-6 col-lg-4 all <?php echo $menus['tipo']; ?>">
                  <div class="box">
                    <div>
                      <div class="img-box">
                        <img src="./assets/images/favicon.png">
                      </div>
                      <div class="detail-box">
                        <h5><?php echo $menus['titulo']; ?></h5>
                        <p><?php echo $menus['descricao']; ?></p>
                        <div class="options">
                          <h6><?php echo $menus['preco']; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }

              // Renderizar cada menus usando array_map
              array_map('renderProduct', $menus);
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- end food section -->

    <?php include './includes/footer.php'; ?>
  </body>
</html>