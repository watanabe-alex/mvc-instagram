<?php

    class Conexao {

        //configura vairáveis da base de dados
        private $host = 'mysql:host=localhost;dbname=mvcinstagram;port=3306';
        private $user = 'root';
        private $pass = 'root';

        //cria coneção com a base de dados
        protected function criarConexao() {
            return new PDO($this->host, $this->user, $this->pass);
        }

    }


?>