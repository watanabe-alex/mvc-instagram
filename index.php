<?php

    // TODO:
    //
    // OBRIGATÓRIO:
    // - Cadastro de usuário;
    // - Login de usuário;
    // - As postagens precisam apresentar o ​nome do usuário que as criou;​
    // - Arquivo com o DER deste projeto (diagrama com a estrutura lógica do seu banco de dados - relações entre tabelas, atributos...).
    // 
    // OPCIONAL:
    // — Likes (adicionar botão para ‘dar like’ e também mostrar a quantidade de likes cada publicação teve)

    
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