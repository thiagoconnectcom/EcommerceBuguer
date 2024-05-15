<?php
    class RegisterController {
        private $registerModel;

        public function __construct($registerModel) {
            $this->registerModel = $registerModel;
        }

        public function registerUser($nome, $email, $senha) {
            // Verificar se o email já está em uso
            $userExisting = $this->registerModel->checkExistingUser($email);

            if ($userExisting) {
                $_SESSION['erro'] = "O email já está em uso. Por favor, tente outro.";
                return false; // Email já está em uso
            }

            // Registrar usuário
            $registerSuccess = $this->registerModel->registerUser($nome, $email, $senha);

            if ($registerSuccess) {
                return true; // Registro bem-sucedido
            } else {
                $_SESSION['erro'] = "Falha ao registrar usuário. Por favor, tente novamente.";
                return false; // Falha no registro
            }
        }
    }
?>