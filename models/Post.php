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
        public function listarPosts($usuario_atual_id) {
            $db = parent::criarConexao();
            //essa query tem referência a base de dados post e puxa um groupby(que conta cada linha)
            //da base de dados like e puxa os dados de se o usuário atual já curtiu a foto
            $query = $db->prepare('SELECT posts.id, posts.imagem, posts.descricao, usuarios.id as usuario_id,
                                usuarios.nome as usuario_nome, num_likes, verify_like.gostou as gostou
                                FROM posts
                                LEFT JOIN (SELECT post_id, COUNT(*) as num_likes FROM likes GROUP BY post_id) cont_likes
                                ON posts.id=cont_likes.post_id
                                LEFT JOIN usuarios
                                ON posts.usuario_id=usuarios.id
                                LEFT JOIN (SELECT post_id, usuario_id as gostou from likes where usuario_id=? group by post_id) verify_like
                                ON posts.id=verify_like.post_id
                                ORDER BY posts.id DESC');
            $query->execute([$usuario_atual_id]); //a variavel de usuario atual é para verificar se o usuário já deu um like nessa foto
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }

    }


?>