<?php

include_once('./models/Produto.php');

class ProductController {
    private $productModel;

    public function __construct(Produto $productModel) {
        $this->productModel = $productModel;
    }

    public function registerProduct($dados) {
        $this->productModel->insertProduct($dados['titulo'], $dados['descricao'], $dados['preco'], $dados['tipo']);
    }

    public function AllProducts() {
        return $this->productModel->selectProduct();
    }
}
?>
