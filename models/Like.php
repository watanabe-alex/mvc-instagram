<?php

    include("Conexao.php");

    class Like extends Conexao {

        //função para registrar o like no post
        public function registrarLike($post_id, $usuario_id) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO likes (post_id, usuario_id) VALUES (?,?)');
            return $query->execute([$post_id, $usuario_id]);
        }

    }


?>