<?php
    class Contact {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function getAllContacts() {
            $sql = "SELECT * FROM faleconosco";
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
