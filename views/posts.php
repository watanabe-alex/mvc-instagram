<?php
    //recebe os posts enviados do controller via request
    $posts = $_REQUEST["posts"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mvc instagram</title>
    <!-- para google icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/styles.css">

</head>
<body>

    <?php include "views/includes/header.php"; ?>

    <main class="board-posts">

        <!-- para cada post cadastrado, cria uma div do tipo card -->
        <?php foreach($posts as $post): ?>
            <div class="card mt-5">

                <!-- imagem do post -->
                <img id="cardimg" src="<?php echo $post->imagem; ?>" alt="Card image cap">

                <div class="card-body">

                    <!-- botão de like e contagem -->
                    <form class="d-flex" method="post" action="like" id="like_form<?php echo $post->id?>">  <!-- id de cada formulário tem que ser dinâmico para queo submit funcione -->
                        <!-- informações para passar para a tabela likes -->
                        <input type="hidden" name="usuario_id" value="<?php echo $usuarioId; ?>">
                        <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                        <!-- configuração do botão like -->
                        <a class="material-icons mr-1" style="color:black; <?php echo ($post->gostou)? "pointer-events:none;" : ""; ?>" href="#" onClick="document.getElementById('like_form<?php echo $post->id?>').submit();">
                            <?php echo ($post->gostou)? "favorite" : "favorite_border"; ?>
                        </a>
                        <!-- mostra a quantidade de likes -->
                        <p><?php echo ($post->num_likes)? $post->num_likes : 0; ?></p> <!-- se número de likes = NULL, imprime 0 -->
                    </form>

                    <!-- usuário e descrição do post -->
                    <p class="card-text"><b><?php echo $post->usuario_nome; ?>: </b><?php echo $post->descricao; ?></p>
                
                </div>
            </div>
        <?php endforeach; ?>

        <a class="float-button" href="formulario-post">&#10010;</a>
    </main>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- código para retornar ao mesmo ponto da página ao dar um like -->
    <script>
        //ao carregar, vai para ultima posição salva
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
        //ao sair, salva posição
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

</body>
</html>