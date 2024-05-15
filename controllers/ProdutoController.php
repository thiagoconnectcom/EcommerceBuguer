<?php

include_once('./models/Produto.php');

class ProdutoController {
    private $produtoModel;

    public function __construct(Produto $produtoModel) {
        $this->produtoModel = $produtoModel;
    }

    public function cadastrarProduto($dados) {
        $this->produtoModel->inserirProduto($dados['titulo'], $dados['descricao'], $dados['preco'], $dados['tipo']);
    }

    public function exibirProdutos() {
        return $this->produtoModel->selecionarProdutos();
    }
}
?>
