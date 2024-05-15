<?php
  session_start();

  include('./services/conexao.php');
  include('./models/ContactForm.php');
  include('./controllers/ContactFormController.php');

  // Variável para armazenar mensagens de erro
  $erro = "";
  $success = "";

  // Criando uma instância do controlador ContactFormController
  $contactFormController = new ContactFormController(new ContactForm($pdo));

  // Lógica para lidar com solicitações HTTP e chamar as funções apropriadas do controlador
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $descricao = $_POST['descricao'];

      // Salvar contato
      $saveSuccess = $contactFormController->saveContact($nome, $email, $descricao);

      if ($saveSuccess) {
          // Definindo mensagem de sucesso
          $_SESSION['success'] = "Mensagem enviada com sucesso!";
          
          // Redirecionando para evitar reenviar o formulário ao atualizar a página
          header("Location: ".$_SERVER['REQUEST_URI']);
          exit();
      } else {
        $_SESSION['erro'] = "Não foi possível enviar mensagem, Tente novamente!";
    }
  }
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
                    placeholder="Nome"
                    name="nome"
                  />
                </div>
                <div>
                  <input
                    required=""
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                  />
                </div>

                <div>
                  <textarea required="" name="descricao" class="form-control" rows="5" placeholder="Mensagem"></textarea>
                </div>
            
                <?php if (!empty($_SESSION['erro'])): ?>
                  <div id="erro" class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['erro']; unset($_SESSION['erro']);?>
                  </div>
                <?php endif; ?>
                
                <?php if (!empty($_SESSION['success'])): ?>
                  <div id="success" class="alert alert-success" role="success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                  </div>
                <?php endif; ?>

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

    <?php include './includes/footer.php'; ?>
  </body>

   <!-- Script para esconder a mensagem de erro após 3 segundos -->
   <script>
        // Função para esconder a mensagem de erro após 3 segundos
        setTimeout(function() {
            var erroDiv = document.getElementById('erro');
            if (erroDiv) {
                erroDiv.style.display = 'none';
            }
        }, 3000); // Tempo em milissegundos (3 segundos)

        // Função para esconder a mensagem de success após 3 segundos
        setTimeout(function() {
            var erroDiv = document.getElementById('success');
            if (erroDiv) {
                erroDiv.style.display = 'none';
            }
        }, 3000); // Tempo em milissegundos (3 segundos)
    </script>
</html>
