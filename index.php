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

    
    $rotas = key($_GET) ? key($_GET) : "login";

    //direciona para um controlador
    switch($rotas) {

        case "login" || "formulario-usuario" || "cadastrar-usuario" || "logar-usuario":
            include "controllers/UserController.php";
            $controller = new UserController();
            $controller->acao($rotas);
            break;

        case "posts" || "formulario-post" || "cadastrar-post":
            include "controllers/PostController.php";
            $controller = new PostController();
            $controller->acao($rotas);
            break;

    }

?>