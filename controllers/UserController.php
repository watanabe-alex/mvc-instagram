<?php

    include_once("models/User.php");

    class UserController {

        //direciona para a ação que o controller deve tomar
        public function acao($rotas) {
            switch($rotas){
                case "inicio":
                    $this->viewMain();
                    break;

                case "formulario-usuario":
                    $this->viewFormUser();
                    break;

                case "cadastrar-usuario":
                    $this->cadastrarUsuario($_POST["nome"],$_POST["senha"]);
                    break;

                case "logar-usuario":
                    $this->logarUsuario($_POST["nome"],$_POST["senha"]);
                    break;

                case "deslogar-usuario":
                    $this->deslogarUsuario();
                    break;
            }
        }


        //verifica se está logado a redireciona para página de login ou de posts
        private function viewMain() {

            //verifica se está logado (se sim, qual é o usuário)
            session_start();
            $usuario = false;
            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]) {
                $usuario = $_SESSION["usuario"];
            }

            if ($usuario) { //caso esteja logado, mostra página de posts
                header('Location:posts');
            } else { //caso não esteja logado, mostra página de login
                include("views/login.php");
            }
        }

        //mostra formulário para registrar usuário
        private function viewFormUser() {
            include("views/register.php");
        }

        //cadastra usuário na base de dados
        private function cadastrarUsuario($nome, $senha) {

            //cadastra usuário na base de dados
            $usuario = new User();
            $resultado = $usuario->cadastrarUsuario($nome, password_hash($senha, PASSWORD_DEFAULT));

            if ($resultado) { //se conseguiu cadastrar usuário, faz login
                $this->logarUsuario($nome, $senha);
            } else { //se não conseguiu cadastrar usuário, direciona para página de erro
                $_REQUEST["erro"] = "Erro ao tentar cadastrar o usuário.";
                include("views/errors.php");
            }
        }

        //loga usuário
        private function logarUsuario($nome, $senha) {

            //busca informações do usuário na base de dados
            $usuario = new User();
            $usuario = $usuario->getUsuario($nome);

            if ($usuario) { //se encontrou o usuário na base de dados tenta fazer login

                if (password_verify($senha, $usuario->senha)) { //se senha correta faz login
                    session_start();
                    $_SESSION["usuario"]["nome"] = $usuario->nome;
                    $_SESSION["usuario"]["id"] = $usuario->id;
                    header('Location:posts'); //diretiona para rota posts
                } else { //se senha errada, direciona para página de erro
                    $_REQUEST["erro"] = "Senha errada.";
                    include("views/errors.php");
                }

            } else { //se não encontrou o usuário na base de dados, direciona para página de erro
                $_REQUEST["erro"] = "Usuário não encontrado.";
                include("views/errors.php");
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