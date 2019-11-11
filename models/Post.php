<?php

    include("Conexao.php");

    class Post extends Conexao {

        public function criarPost($imagem, $descricao) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO posts (imagem, descricao) VALUES (?,?)');
            return $query->execute([$imagem, $descricao]);
        }

        public function listarPosts() {
            $db = parent::criarConexao();
            $query = $db->query('SELECT * FROM posts ORDER BY id DESC');
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $resultado;
        }

    }


?>