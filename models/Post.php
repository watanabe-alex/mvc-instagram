<?php

    include("Conexao.php");

    class Post extends Conexao {

        public function criarPost($imagem, $descricao, $usuarioId) {

            var_dump($imagem);
            var_dump($descricao);
            var_dump($usuarioId);

            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO posts (imagem, descricao, usuario_id) VALUES (?,?,?)');
            return $query->execute([$imagem, $descricao, $usuarioId]);
        }

        public function listarPosts() {
            $db = parent::criarConexao();
            $query = $db->query('SELECT posts.*, usuarios.nome FROM posts LEFT JOIN usuarios ON posts.usuario_id=usuarios.id ORDER BY posts.id DESC');
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }

    }


?>