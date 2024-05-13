<?php

session_start();

include('./services/conexao.php');

// Variável para armazenar mensagens de erro
$erro = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // Verifica se o email já está em uso
    $sql_verificar_email = "SELECT * FROM usuarios WHERE email = :email";
    $stmt_verificar_email = $pdo->prepare($sql_verificar_email);
    $stmt_verificar_email->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt_verificar_email->execute();
    $quantidade_email = $stmt_verificar_email->rowCount();

    if ($quantidade_email > 0) {
        $_SESSION['erro'] = "O email já está em uso. Por favor, tente outro.";
    } else {
        // Preparando a consulta SQL para inserir os dados na tabela de usuários
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        try {
            // Executando a consulta preparada
            $stmt->execute();

            // Definindo mensagem de sucesso
            $_SESSION['success'] = "Registro realizado com sucesso!";
            
            // Redirecionando para evitar reenviar o formulário ao atualizar a página
            header("Location: login.php");
            exit();
        } catch (PDOException $e) {
            // Capturando e tratando possíveis erros
            $_SESSION['erro'] = "Falha na execução do código SQL: " . $e->getMessage();
        }
    }
}
?>                     

<!DOCTYPE html>
<html class="h-100">
    <?php include './components/head.php'; ?>
    
    <body class="h-100 login">
        <section class="h-100 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="text-warning">Registrar</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <form action="" class="signin-form" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nome" placeholder="Nome" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="senha" class="form-control" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                    <a href="login.php" class="text-warning">voltar</a>
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

        // Função para esconder a mensagem de success após 3 segundos
        setTimeout(function() {
            var erroDiv = document.getElementById('success');
            if (erroDiv) {
                erroDiv.style.display = 'none';
            }
        }, 3000); // Tempo em milissegundos (3 segundos)
    </script>
</html>
