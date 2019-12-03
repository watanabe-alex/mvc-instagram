<?php

    //TODO: tirar os echo dos controllers
    //TODO: passar tudo pro ingles

    include_once("models/User.php");

    class UserController {

        //direciona para uma ação que o controller vai tomar
        public function acao($rotas) {
            switch($rotas){
                case "inicio":
                    $this->viewMain();
                break;

                case "formulario-usuario":
                    $this->viewFormUser();
                    break;

                case "cadastrar-usuario":
                    $this->cadastrarUsuario();
                    break;

                case "logar-usuario":
                    $this->logarUsuario();
                    break;

                case "deslogar-usuario":
                    $this->deslogarUsuario();
            }
        }


        //verifica se está logado a redireciona para página de login ou de posts
        private function viewMain() {
            session_start();
            $usuario = false;
            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]) {
                $usuario = $_SESSION["usuario"];
            }
            if ($usuario) {
                header('Location:posts');
            } else {
                include("views/login.php");
            }
        }

        //mostra formulário usuário
        private function viewFormUser() {
            include("views/register.php");
        }

        //cadastra usuário na base de dados
        private function cadastrarUsuario() {
            $nome = $_POST["nome"];
            $senha = $_POST["senha"];

            $usuario = new User();
            $resultado = $usuario->cadastrarUsuario($nome, password_hash($senha, PASSWORD_DEFAULT));

            if ($resultado) {
                header('Location:posts');
            } else {
                echo "deu errado!";
            }
        }

        //loga usuário
        private function logarUsuario() {
            $nome = $_POST["nome"];
            $senha = $_POST["senha"];

            $usuario = new User();
            $usuario = $usuario->getUsuario($nome);

            if ($usuario) {
                if (password_verify($senha, $usuario->senha)) {
                    //faz login na sessão
                    session_start();
                    $_SESSION["usuario"] = $usuario->nome;
                    header('Location:posts');
                } else {
                    echo "senha errada, brow!";
                }
            } else {
                echo "usuário não encontrado";
            }

        }

        //desloga usuario
        private function deslogarUsuario() {
            session_start();
            session_destroy();
            header('Location:inicio');
        }
    }

?>