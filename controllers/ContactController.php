<?php
    class ContactController {
        private $contactModel;

        public function __construct($contactModel) {
            $this->contactModel = $contactModel;
        }

        public function getAllContacts() {
            return $this->contactModel->getAllContacts();
        }
    }
?>
