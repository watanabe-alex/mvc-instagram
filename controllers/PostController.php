<?php

    include_once("models/Post.php");

    class PostController {

        //direciona para uma ação que o controller vai tomar
        public function acao($rotas) {
            switch($rotas){
                case "posts":
                    $this->viewPosts();
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

            $post = new Post();
            $resultado = $post->criarPost($caminhoSalvar, $descricao);

            if ($resultado) {
                header('Location:/mvc-instagram/posts');
            }

        }

    }

?>