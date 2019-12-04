<?php

    include("Conexao.php");

    class User extends Conexao {

        //função para cadastrar usuário na base de dados
        public function cadastrarUsuario($nome, $senha) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO usuarios (nome, senha) VALUES (?,?)');
            return $query->execute([$nome, $senha]);
        }

        //função para buscar informações do usuário na base de dados
        public function getUsuario($nome) {
            $db = parent::criarConexao();
            $query = $db->prepare('SELECT * FROM usuarios WHERE nome=?');
            $query->execute([$nome]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

    }


?>