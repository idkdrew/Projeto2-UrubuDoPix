<?php
    class Endereco {

        public $id;
        public $login;
        public $cep;
        public $logradouro;
        public $complemento;
        public $numero;
        public $bairro;
        public $cidade;
        public $uf;
    
        public function __construct($id, $login, $cep, $logradouro, $complemento, $numero, $bairro, $cidade, $uf) {
            $this->id = $id;
            $this->login = $login;
            $this->cep = $cep;
            $this->logradouro = $logradouro;
            $this->complemento = $complemento;
            $this->numero = $numero;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->uf = $uf;
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
    
        public function getCep() {
            return $this->cep;
        }
    
        public function setCep($cep) {
            $this->cep = $cep;
        }
    
        public function getLogradouro() {
            return $this->logradouro;
        }
    
        public function setLogradouro($logradouro) {
            $this->logradouro = $logradouro;
        }
    
        public function getComplemento() {
            return $this->complemento;
        }
    
        public function setComplemento($complemento) {
            $this->complemento = $complemento;
        }
    
        public function getNumero() {
            return $this->numero;
        }
    
        public function setNumero($numero) {
            $this->numero = $numero;
        }
    
        public function getBairro() {
            return $this->bairro;
        }
    
        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }
    
        public function getCidade() {
            return $this->cidade;
        }
    
        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
    
        public function getUf() {
            return $this->uf;
        }
    
        public function setUf($uf) {
            $this->uf = $uf;
        }
        
    }
?>