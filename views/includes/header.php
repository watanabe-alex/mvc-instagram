<?php

    if(!isset($_SESSION)) { session_start(); }  //inicia a sessão caso ainda não tenha sido iniciada
    $usuario = false;
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]) {
        $usuario = $_SESSION["usuario"];
    }
    
?>

<header>
    <nav class="navbar topo-instagran justify-content-center">
        <a class="navbar-brand" href="inicio"><img width="90" src="views/img/logo.png" alt="" srcset="">Instagram</a>
        <?php if ($usuario) { ?>
            <div>
                <b>Olá, <?php echo $usuario; ?></b>
                <a href="deslogar-usuario">Sair</a>
            </div>
        <?php } ?>
    </nav>
</header>