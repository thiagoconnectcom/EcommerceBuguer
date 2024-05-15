<?php
    class UserController {
        private $userModel;

        public function __construct($userModel) {
            $this->userModel = $userModel;
        }

        public function getAllUsers() {
            return $this->userModel->getAllUsers();
        }
    }
?>
