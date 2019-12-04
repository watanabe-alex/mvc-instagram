<?php

    include_once("models/Post.php");

    class PostController {

        //direciona para uma ação que o controller vai tomar
        public function acao($rotas) {
            switch($rotas){
                case "posts":
                    $this->listarPosts();
                    break;

                case "formulario-post":
                    $this->viewFormularioPost();
                    break;

                case "cadastrar-post":
                    $this->cadastrarPost();
                    break;
            }
        }

        //mostra posts
        private function viewPosts() {
            include("views/posts.php");
        }

        //listar posts
        private function listarPosts() {
            $post = new Post();
            $listaPosts = $post->listarPosts();
            $_REQUEST["posts"] = $listaPosts;
            $this->viewPosts();
        }

        //mostra formulário
        private function viewFormularioPost() {
            include("views/newPost.php");
        }

        //cadastrar post no banco de dados
        private function cadastrarPost() {
            $descricao = $_POST["descricao"];
            $nomeArquivo = $_FILES["img"]["name"];
            $linkTemp = $_FILES["img"]["tmp_name"];
            $caminhoSalvar = "views/img/$nomeArquivo";
            move_uploaded_file($linkTemp, $caminhoSalvar);

            session_start();
            $usuarioId = $_SESSION["usuario"]["id"];

            $post = new Post();
            $resultado = $post->criarPost($caminhoSalvar, $descricao, $usuarioId);

            if ($resultado) {
                header('Location:posts');
            } else {
                echo "deu errado, brotherrr!";
            }

        }

    }

?>