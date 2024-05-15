<?php
    session_start();

    include('./services/conexao.php');
    include('./models/Login.php');
    include('./controllers/LoginController.php');

    // Variável para armazenar mensagens de erro
    $erro = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        // Criando uma instância do controlador LoginController
        $loginController = new LoginController(new Login($pdo));

        // Autenticar usuário
        $usuario = $loginController->authenticateUser($email, $senha);

        if ($usuario) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: productsDashboard.php");
            exit();
        } else {
            $erro = "Credenciais inválidas. Por favor, tente novamente.";
        }
    }
?>


<!DOCTYPE html>
<html class="h-100">
    <?php include './includes/head.php'; ?>
    
    <body class="h-100 login">
        <section class="h-100 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="text-warning">Login</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <form action="" class="signin-form" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="senha" class="form-control" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                    <a href="register.php" class="text-warning">cadastre-se</a>
                                </div>
                                <?php if (!empty($erro)): ?>
                                    <div id="erro" class="alert alert-danger" role="alert">
                                        <?php echo $erro; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-warning submit px-3">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    </script>
</html>
