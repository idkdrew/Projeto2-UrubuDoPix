<?php
    class Usuario {

        private $login;
        private $nome;

        public function __construct($login, $nome) {
            $this->login = $login;
            $this->nome = $nome;
        }

        public function getLogin() {
            return $this->login;
        }

        public function getNome() {
            return $this->nome;
        }
    
        public function setNome($nome) {
            $this->nome = $nome;
        }

    }
?>