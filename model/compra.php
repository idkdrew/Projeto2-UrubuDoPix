<?php
    class Compra {

        private $id;
        private $login;
        private $data;

        public function __construct($id, $login, $data) {
            $this->id = $id;
            $this->login = $login;
            $this->data = $data;
        }

        public function getId() {
            return $this->id;
        }
        
        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function getData() {
            return $this->data;
        }

        public function setData($data) {
            $this->data = $data;
        }
   
        
    }
?>