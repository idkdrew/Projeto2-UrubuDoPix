<?php
    class Produto {

        private $id;
        private $nome;
        private $descricao;
        private $preco;
        private $estoque;

        public function __construct($id, $nome, $descricao, $preco, $estoque) {
            $this->id = $id;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->preco = 'R$' . number_format($preco, 2, ',', '.');
            $this->estoque = $estoque;
        }

        public function getId() {
            return $this->id;
        }
        
        public function getNome() {
            return $this->nome;
        }
    
        public function setNome($nome) {
            $this->nome = $nome;
        }
    
        public function getDescricao() {
            return $this->descricao;
        }
    
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
    
        public function getPreco() {
            return $this->preco;
        }
    
        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getEstoque() {
            return $this->estoque;
        }
    
        public function setEstoque($estoque) {
            $this->estoque = $estoque;
        }

    }
?>