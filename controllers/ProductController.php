<?php

include_once('./models/Product.php');

class ProductController {
    private $productModel;

    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    public function registerProduct($data) {
        $this->productModel->insertProduct($data['titulo'], $data['descricao'], $data['preco'], $data['tipo']);
    }

    public function AllProducts() {
        return $this->productModel->selectProduct();
    }
}
?>
