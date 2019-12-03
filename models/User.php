<?php

    include("Conexao.php");

    class User extends Conexao {

        public function cadastrarUsuario($nome, $senha) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO usuarios (nome, senha) VALUES (?,?)');
            return $query->execute([$nome, $senha]);
        }

        public function getUsuario($nome) {
            $db = parent::criarConexao();
            $query = $db->prepare('SELECT * FROM usuarios WHERE nome=?');
            $query->execute([$nome]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

    }


?>