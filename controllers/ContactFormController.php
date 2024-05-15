<?php
    class ContactFormController {
        private $contactFormModel;

        public function __construct($contactFormModel) {
            $this->contactFormModel = $contactFormModel;
        }

        public function saveContact($nome, $email, $descricao) {
            return $this->contactFormModel->saveContact($nome, $email, $descricao);
        }
    }
?>
