<?php
    class ContactForm {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function saveContact($nome, $email, $descricao) {
            $sql = "INSERT INTO faleconosco (nome, email, descricao) VALUES (:nome, :email, :descricao)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);

            try {
                $stmt->execute();
                return true; // Sucesso ao salvar
            } catch (PDOException $e) {
                return false; // Falha ao salvar
            }
        }
    }
?>
