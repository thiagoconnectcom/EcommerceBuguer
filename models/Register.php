<?php
    class Register {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function checkExistingUser($email) {
            $sql_verify_email = "SELECT * FROM usuarios WHERE email = :email";
            $stmt_verify_email = $this->pdo->prepare($sql_verify_email);
            $stmt_verify_email->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt_verify_email->execute();
            $quantidade_email = $stmt_verify_email->rowCount();

            return ($quantidade_email > 0);
        }

        public function registerUser($nome, $email, $senha) {
            // Verificar se o email já está em uso
            $userExisting = $this->checkExistingUser($email);

            if ($userExisting) {
                return false; // Email já está em uso
            }

            // Inserir novo usuário
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

            try {
                $stmt->execute();
                return true; // Registro bem-sucedido
            } catch (PDOException $e) {
                die("Falha na execução do código SQL: " . $e->getMessage());
            }
        }
    }
?>