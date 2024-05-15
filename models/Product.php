<?php
    class Product {
        private $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function insertProduct($titulo, $descricao, $preco, $tipo) {
            $sql = "INSERT INTO produtos (tipo, titulo, descricao, preco) VALUES (:tipo, :titulo, :descricao, :preco)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            $stmt->execute();
        }

        public function selectProduct() {
            $sql = "SELECT * FROM produtos";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
