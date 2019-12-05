<?php 

    //TODO: nao rolar a página depois do like

    //TODO: Arquivo com o DER deste projeto (diagrama com a estrutura lógica do seu banco de dados - relações entre tabelas, atributos...).

    //FIXME: primeiro card do post fica com o fundo deslinhado

    //define rota default
    $rotas = key($_GET) ? key($_GET) : "inicio";

    //direciona para um controlador
    switch($rotas) {

        //controlador UserController
        case "inicio":
        case "formulario-usuario":
        case "cadastrar-usuario":
        case "logar-usuario":
        case "deslogar-usuario":
            include "controllers/UserController.php";
            $controller = new UserController();
            $controller->acao($rotas);
            break;

        //controlador PostController
        case "posts":
        case "formulario-post":
        case "cadastrar-post":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
            break;

        //controlador LikeController
        case "like":
            include "controllers/LikeController.php";
            $controller = new LikeController();
            $controller->acao($rotas);
            break;

    }

?>