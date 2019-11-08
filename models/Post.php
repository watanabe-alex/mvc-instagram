<?php

    include("Conexao.php");

    class Post extends Conexao {

        public function criarPost($imagem, $descricao) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO posts (imagem, descricao) VALUES (?,?)');
            return $query->execute([$imagem, $descricao]);
        }

    }


?>