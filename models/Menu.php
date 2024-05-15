<?php
class Menu {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function getAllMenus() {
            $sql_select = "SELECT * FROM produtos";
            $stmt_select = $this->pdo->query($sql_select);
            return $stmt_select->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
