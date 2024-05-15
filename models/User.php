<?php
    class User {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function getAllUsers() {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->pdo->prepare($sql);

            try {
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Failed to execute SQL code: " . $e->getMessage());
            }
        }
    }
?>
