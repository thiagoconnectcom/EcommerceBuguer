<?php
    include('./middleware/protect.php');

    include('./services/conexao.php');

    // Variável para armazenar mensagens de erro
    $erro = "";
    $success = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
        $novoNomeDoArquivo = uniqid();

        // Diretório para salvar as imagens dos produtos
        $diretorio_imagens = "uploads/";

        // Verificar se o arquivo é uma imagem
        $imagem_extensao = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));
      
        // Gerar o caminho completo da imagem
        $imagem = $diretorio_imagens . $novoNomeDoArquivo . "." . $imagem_extensao;

        // Movendo o arquivo de imagem para o diretório de upload
        if (move_uploaded_file($imagem_tmp, $imagem)) {
            $sql = "INSERT INTO produtos (tipo, titulo, descricao, preco, imagem) VALUES (:tipo, :titulo, :descricao, :preco, :imagem)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);

            $stmt->execute();
            
            $_SESSION['success'] = "Produto criado com sucesso.";

            // Redirecionando para evitar reenviar o formulário ao atualizar a página
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['erro'] = "Falha ao fazer o upload da imagem.";
        }
    }

     // Exibir dados cadastrados
    $sql_select = "SELECT * FROM produtos";
    $stmt_select = $pdo->query($sql_select);
    $products = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
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
                        <h1 class="h2">Produtos</h1>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                         Cadastrar
                        </button>
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

                    <?php if (!empty($products)): ?>
                    <div class="table-responsive">
                        <table class="table-striped table">
                            <tr>
                                <th>Tipo</th>
                                <th>Titulo</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>imagem</th>
                            </tr>
                            <?php foreach ($products as $data): ?>
                                <tr>
                                    <td><?php echo $data['tipo']; ?></td>
                                    <td><?php echo $data['titulo']; ?></td>
                                    <td><?php echo $data['descricao']; ?></td>
                                    <td>R$ <?php echo number_format($data['preco'], 2, ',', '.'); ?></td>
                                    <td>
                                        <img src="<?php echo $data['imagem']; ?>" alt="<?php echo $data['titulo']; ?>" style="width: 100px;">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php else: ?>
                        <p>Não há dados para exibir.</p>
                    <?php endif; ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="signin-form" method="POST" enctype="multipart/form-data">
                                        <div>
                                            <select name="tipo" class="form-control nice-select wide mb-3">
                                                <option value="" disabled selected></option>
                                                <option value="pizza">
                                                    Pizza
                                                </option>
                                                <option value="burger">
                                                    Hambuguer
                                                </option>
                                                <option value="pasta">
                                                    Massa
                                                </option>
                                                <option value="fries">
                                                    Fritas
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="titulo" placeholder="Titulo" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" name="descricao" placeholder="Descrição" required="">
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="preco" class="form-control" placeholder="Preço" required="">
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="imagem">Imagem:</label>
                                            <input type="file" name="imagem" class="form-control-file" accept="image/*" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="form-control btn btn-warning submit px-3">Criar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
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