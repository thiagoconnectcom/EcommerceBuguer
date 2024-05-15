<?php
    class LoginController {
        private $loginModel;

        public function __construct($loginModel) {
            $this->loginModel = $loginModel;
        }

        public function authenticateUser($email, $senha) {
            return $this->loginModel->authenticateUser($email, $senha);
        }
    }
?>
