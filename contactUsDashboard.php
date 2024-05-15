<?php
    include('./middleware/protect.php');
    include('./services/conexao.php');
    include('./models/Contact.php');
    include('./controllers/ContactController.php');

    // Criando uma instância do controlador ContactController
    $contactController = new ContactController(new Contact($pdo));

    // Obtendo todos os contatos
    $contactUs = $contactController->getAllContacts();
?>

<!DOCTYPE html>
<html class="h-100">
    <?php include './includes/head.php'; ?>
    
    <body>
        <?php
            include('./layouts/dashboard/header.php');
        ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                    include('./layouts/dashboard/menu.php');
                ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Fale Conosco</h1>
                </div>

                <?php if (!empty($contactUs)): ?>
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Descrição</th>
                            </tr>
                            <?php foreach ($contactUs as $mensagem): ?>
                                <tr>
                                    <td><?php echo $mensagem['nome']; ?></td>
                                    <td><?php echo $mensagem['email']; ?></td>
                                    <td><?php echo $mensagem['descricao']; ?></td>
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