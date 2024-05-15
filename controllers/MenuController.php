<?php
    class MenuController {
        private $menuModel;

        public function __construct($menuModel) {
            $this->menuModel = $menuModel;
        }

        public function getAllMenus() {
            return $this->menuModel->getAllMenus();
        }
    }
?>
