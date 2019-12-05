<?php

    include_once("models/Like.php");

    class LikeController {

        //direciona para a ação que o controller deve tomar
        public function acao($rotas) {
            switch($rotas){
                case "like":
                    $this->cadastrarLike($_POST["post_id"], $_POST["usuario_id"]);
                    break;
            }
        }

        //verifica se está logado a redireciona para página de login ou de posts
        private function cadastrarLike($post_id, $usuario_id){
            $like = new Like();
            $resultado = $like->registrarLike($post_id, $usuario_id);

            if ($resultado) { //conseguiu registrar o post
                header('Location:posts');
            } else { //caso não tenha conseguido registrar o post
                $_REQUEST["erro"] = "Erro ao registrar o like.";
                include("views/errors.php");
            }
        }

      
    }

?>