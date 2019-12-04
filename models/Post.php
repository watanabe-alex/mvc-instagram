<?php

    include("Conexao.php");

    class Post extends Conexao {

        //função para salvar post na base de dados
        public function criarPost($imagem, $descricao, $usuarioId) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO posts (imagem, descricao, usuario_id) VALUES (?,?,?)');
            return $query->execute([$imagem, $descricao, $usuarioId]);
        }

        //função para buscar posts da base de dados
        public function listarPosts() {
            $db = parent::criarConexao();
            $query = $db->query('SELECT posts.*, usuarios.nome FROM posts LEFT JOIN usuarios ON posts.usuario_id=usuarios.id ORDER BY posts.id DESC');
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }

    }


?>