<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
    
    <?php include "views/includes/header.php"; ?>

    <main>

        <h1>Login</h1>
        <form action="logar-usuario" method="post">
            <div class="form-group">
                <label for="idNameInput">Nome</label>
                <input type="text" class="form-control" id="idNameInput" name="nome" laceholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="idPassword">Password</label>
                <input type="password" class="form-control" id="idPassword" name="senha" placeholder="Senha">
            </div>
            <a href="formulario-usuario">Não tenho cadastro</a>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>

    </main>

</body>
</html>