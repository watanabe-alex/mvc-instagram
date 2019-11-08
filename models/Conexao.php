<?php

    class Conexao {

        private $host = 'mysql:host=localhost;dbname=instagram;port=3306';
        private $user = 'root';
        private $pass = 'root';

        public function criarConexao() {
            return new PDO($this->host, $this->user, $this->pass);
        }

    }


?>