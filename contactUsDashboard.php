<?php
    include('./middleware/protect.php');

    include('./services/conexao.php');

    // Variável para armazenar mensagens de erro
    $erro = "";

    // Consulta SQL para selecionar todos os dados da tabela faleconosco
    $sql = "SELECT * FROM faleconosco";
    $stmt = $pdo->prepare($sql);

    try {
        // Executando a consulta preparada
        $stmt->execute();

        // Obtendo os resultados da consulta
        $faleconosco = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Capturando e tratando possíveis erros
        $erro = "Falha na execução do código SQL: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html class="h-100">
    <?php include './components/head.php'; ?>
    
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

                <?php if (!empty($faleconosco)): ?>
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Descrição</th>
                            </tr>
                            <?php foreach ($faleconosco as $mensagem): ?>
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