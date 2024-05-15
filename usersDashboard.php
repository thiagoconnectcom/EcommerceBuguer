<?php
    include('./middleware/protect.php');
    include('./services/conexao.php');
    include('./models/User.php');
    include('./controllers/UserController.php');

    // Criando uma instância do controlador UserController
    $userController = new UserController(new User($pdo));

    // Obtendo todos os usuários
    $users = $userController->getAllUsers();
?>


<!DOCTYPE html>
<html class="h-100">
    <?php include './includes/head.php'; ?>
    
    <body class=""h-100>
        <?php
            include('./layouts/dashboard/header.php');
        ?>

        <div class="container-fluid h-100">
            <div class="row">
                <?php
                    include('./layouts/dashboard/menu.php');
                ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Usuários</h1>
                </div>

                <?php if (!empty($users)): ?>
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                            <?php foreach ($users as $item): ?>
                                <tr>
                                    <td><?php echo $item['nome']; ?></td>
                                    <td><?php echo $item['email']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php else: ?>
                        <p>Não há dados para exibir.</p>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </body>
</html>