<?php

    // TODO:
    //
    // OBRIGATÓRIO:
    // - Arquivo com o DER deste projeto (diagrama com a estrutura lógica do seu banco de dados - relações entre tabelas, atributos...).
    // 
    // OPCIONAL:
    // — Likes (adicionar botão para ‘dar like’ e também mostrar a quantidade de likes cada publicação teve)

    //TODO: arrumar mensagens de erro para logar
    //TODO: revisar todos os nomes dos métodos

    $rotas = key($_GET) ? key($_GET) : "inicio";

    //direciona para um controlador
    switch($rotas) {

        case "inicio":
        case "formulario-usuario":
        case "cadastrar-usuario":
        case "logar-usuario":
        case "deslogar-usuario":
            include "controllers/UserController.php";
            $controller = new UserController();
            $controller->acao($rotas);
            break;

        case "posts":
        case "formulario-post":
        case "cadastrar-post":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
            break;

    }

?>