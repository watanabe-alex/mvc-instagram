<?php

    if(!isset($_SESSION)) { session_start(); }  //inicia a sessão caso ainda não tenha sido iniciada
    $usuarioNome = false;
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]) {
        $usuarioNome = $_SESSION["usuario"]["nome"];
    }
    
?>

<header>
    <nav class="navbar topo-instagran justify-content-center">
        <a class="navbar-brand" href="inicio"><img width="90" src="views/img/logo.png" alt="" srcset="">Instagram</a>
        <?php if ($usuarioNome) { ?>
            <div>
                <b>Olá, <?php echo $usuarioNome; ?></b>
                <a href="deslogar-usuario">Sair</a>
            </div>
        <?php } ?>
    </nav>
</header>