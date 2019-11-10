<?php

    $rotas = key($_GET) ? key($_GET) : "posts";

    //direciona para um controlador
    switch($rotas) {

        case "posts" || "formulario-post" || "cadastrar-post":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
            break;

        // case "posts":
        //     include "controllers/PostController.php";
        //     $controller = new PostController();
        //     $controller->acao($rotas);
        //     break;

        // case "formulario-post":
        //     include "controllers/PostController.php";
        //     $controller = new PostController();
        //     $controller->acao($rotas);
        //     break;

        // case "cadastrar-post":
        //     include "controllers/PostController.php";
        //     $controller = new PostController();
        //     $controller->acao($rotas);
        //     break;
               

    }

?>