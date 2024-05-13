<?php

  include('./services/conexao.php');

  // Variável para armazenar mensagens de erro
  $erro = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $descricao = $_POST['descricao'];

      // Preparando a consulta SQL para inserir os dados na tabela faleconosco
      $sql = "INSERT INTO faleconosco (nome, email, descricao) VALUES (:nome, :email, :descricao)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);

      try {
          // Executando a consulta preparada
          $stmt->execute();
      } catch (PDOException $e) {
          // Capturando e tratando possíveis erros
          die("Falha na execução do código SQL: " . $e->getMessage());
      }
  }
?>


<!DOCTYPE html>
<html>
  <?php include './components/header.php'; ?>

  <body class="sub_page">
    <div class="hero_area">
      <div class="bg-box">
        <img src="images/hero-bg.jpg" alt="" />
      </div>
      <!-- header section strats -->
      <?php include './components/menu.php'; ?>
      <!-- end header section -->
    </div>

    <!-- book section -->
    <section class="book_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Fale Conosco</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form_container">
              <form action="" method="POST">
                <div>
                  <input
                    required=""
                    type="text"
                    class="form-control"
                    placeholder="Your Name"
                    name="nome"
                  />
                </div>
                <div>
                  <input
                    required=""
                    type="email"
                    class="form-control"
                    placeholder="Your Email"
                    name="email"
                  />
                </div>

                <div>
                  <textarea required="" name="descricao" class="form-control" rows="3"></textarea>
                </div>
            
                <div class="btn_box">
                  <button type="submit">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end book section -->

    <?php include './components/footer.php'; ?>
  </body>
</html>
