<?php

    //include_once("models/Post.php");
    //TODO: adicionar models User


    class UserController {

        //direciona para uma ação que o controller vai tomar
        public function acao($rotas) {
            switch($rotas){
                case "login":
                    $this->viewLogin();
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
            }
        }

        //mostra página login
        private function viewLogin() {
            include("views/login.php");
        }

        //mostra formulário usuário
        private function viewFormUser() {
            include("views/register.php");
        }

        //TODO: montar função de cadastrar usuario
        private function cadastrarUsuario() {

        }

        //TODO: montar função de logar usuário
        private function logaUsuario() {

        }
    }

?>