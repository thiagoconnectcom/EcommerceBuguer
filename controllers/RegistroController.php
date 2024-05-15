<?php
    class RegistroController {
        private $registroModel;

        public function __construct($registroModel) {
            $this->registroModel = $registroModel;
        }

        public function cadastrarUsuario($nome, $email, $senha) {
            // Verificar se o email já está em uso
            $usuarioExistente = $this->registroModel->verificarUsuarioExistente($email);

            if ($usuarioExistente) {
                $_SESSION['erro'] = "O email já está em uso. Por favor, tente outro.";
                return false; // Email já está em uso
            }

            // Registrar usuário
            $registroSucesso = $this->registroModel->cadastrarUsuario($nome, $email, $senha);

            if ($registroSucesso) {
                return true; // Registro bem-sucedido
            } else {
                $_SESSION['erro'] = "Falha ao registrar usuário. Por favor, tente novamente.";
                return false; // Falha no registro
            }
        }
    }
?>