<?php
    class Registro {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function verificarUsuarioExistente($email) {
            $sql_verificar_email = "SELECT * FROM usuarios WHERE email = :email";
            $stmt_verificar_email = $this->pdo->prepare($sql_verificar_email);
            $stmt_verificar_email->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt_verificar_email->execute();
            $quantidade_email = $stmt_verificar_email->rowCount();

            return ($quantidade_email > 0);
        }

        public function cadastrarUsuario($nome, $email, $senha) {
            // Verificar se o email já está em uso
            $usuarioExistente = $this->verificarUsuarioExistente($email);

            if ($usuarioExistente) {
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