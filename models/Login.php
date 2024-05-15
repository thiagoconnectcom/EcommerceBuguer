<?php
    class Login {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function authenticateUser($email, $senha) {
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

            try {
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $qtd = $stmt->rowCount();

                if ($qtd == 1) {
                    return $user;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                die("Falha na execução do código SQL: " . $e->getMessage());
            }
        }
    }
?>
