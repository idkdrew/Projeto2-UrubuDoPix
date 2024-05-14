<?php
    class ItemCompra {

        private $id;
        private $idcompra;
        private $idproduto;
        private $quantidade;

        public function __construct($id, $idcompra, $idproduto, $quantidade) {
            $this->id = $id;
            $this->idcompra = $idcompra;
            $this->idproduto = $idproduto;
            $this->quantidade = $quantidade;
        }

        public function getId() {
            return $this->id;
        }
        
        public function getIdcompra() {
            return $this->idcompra;
        }

        public function getIdproduto() {
            return $this->idcompra;
        }

        public function getQuantidade() {
            return $this->idcompra;
        }
   
        
    }
?>