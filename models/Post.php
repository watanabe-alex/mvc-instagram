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
            $query = $db->query('SELECT posts.id, posts.imagem, posts.descricao, usuarios.id as usuario_id, usuarios.nome as usuario_nome, num_likes FROM posts
                                LEFT JOIN (SELECT post_id, COUNT(*) as num_likes FROM likes GROUP BY post_id) cont_likes
                                ON posts.id=cont_likes.post_id
                                LEFT JOIN usuarios ON posts.usuario_id=usuarios.id
                                ORDER BY posts.id DESC');
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }

    }


?>