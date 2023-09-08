<?php

    Class Usuario {
        private $cod;
        private $nome;
        private $tel;
        private $sexo;
        private $nasc;
        private $estado;
        private $email;

        public function setCod($cod) {
            $this->cod = $cod;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function setTele($tel) {
            $this->tel = $tel;
        }
        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }
        public function setNasc($nasc){
            $this->nasc = $nasc;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function setEmail($email){
            $this->email = $email;
        }


        public function getCod(){
            return $this->cod;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getSexo(){
            return $this->sexo;
        }
        public function getTel(){
            return $this->tel;
        }
        public function getNasc(){
            return $this->nasc;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getEmail(){
            return $this->email;
        }
        
    }

?>