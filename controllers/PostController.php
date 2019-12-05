<?php

    include_once("models/Post.php");

    class PostController {

        //direciona para a ação que o controller deve tomar
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

        //mostra a página de posts
        private function viewPosts() {
            include("views/posts.php");
        }

        //busca os posts na base de dados e mostra na página posts
        private function listarPosts() {
            session_start();
            $usuarioId = $_SESSION["usuario"]["id"];

            $post = new Post();
            $listaPosts = $post->listarPosts($usuarioId);
            $_REQUEST["posts"] = $listaPosts; //utiliza-se o $_REQUEST para passar a lista de posts para a view
            $this->viewPosts();
        }

        //mostra a página de formulário para novos posts
        private function viewFormularioPost() {
            include("views/newPost.php");
        }

        //cadastrar post no banco de dados
        private function cadastrarPost() {

            //seta a descricão do post para salvar no banco
            $descricao = $_POST["descricao"];

            //seta o url da image do post para salvar no banco e valva e imagem em view/img/
            $nomeArquivo = $_FILES["img"]["name"];
            $linkTemp = $_FILES["img"]["tmp_name"];
            $caminhoSalvar = "views/img/$nomeArquivo";
            move_uploaded_file($linkTemp, $caminhoSalvar);

            //seta o id do usuário para salvar no banco
            session_start();
            $usuarioId = $_SESSION["usuario"]["id"];

            //salva o post no banco de dados
            $post = new Post();
            $resultado = $post->criarPost($caminhoSalvar, $descricao, $usuarioId);

            if ($resultado) { //se deu certo redireciona para a rota posts
                header('Location:posts');
            } else { //se deu errado redireciona mostra tela de erro
                $_REQUEST["erro"] = "Erro ao tentar cadastrar o post.";
                include("views/errors.php");
            }
           
        }

    }

?>