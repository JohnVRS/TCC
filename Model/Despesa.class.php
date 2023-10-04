<?php
    Class Despesa {
        private $cod;
        private $cod_usuario;
        private $valor;
        private $descri;
        private $data;
        private $categoria;

        public function setCod($cod) {
            $this->cod = $cod;
        }
        public function setCodUsuario($cod_usuario) {
            $this->cod_usuario = $cod_usuario;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }
        public function setDescri($descri) {
            $this->descri = $descri;
        }
        public function setData($data) {
            $this->data = $data;
        }
        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

        public function getCod(){
            return $this->cod;
        }
        public function getCodUsuario(){
            return $this->cod_usuario;
        }
        public function getValor(){
            return $this->valor;
        }
        public function getDescri(){
            return $this->descri;
        }
        public function getData(){
            return $this->data;
        }
        public function getCategoria(){
            return $this->categoria;
        }

        public function __construct($cod_usuario = null , $valor = null , $descri = null, $data = null,$categoria = null) {
            $this->cod_usuario = $cod_usuario;
            $this->valor = $valor;
            $this->descri = $descri;
            $this->data = $data;
            $this->categoria = $categoria;
        }
    }
?>