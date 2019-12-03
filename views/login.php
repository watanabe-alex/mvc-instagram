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
        <form action="" method="post">
            <div class="form-group">
                <label for="idEmailInput">Email</label>
                <input type="email" class="form-control" id="idEmailInput" laceholder="Digite seu e-mail">
            </div>
            <div class="form-group">
                <label for="idPassword">Password</label>
                <input type="password" class="form-control" id="idPassword" placeholder="Senha">
            </div>
            <a href="formulario-usuario">Não tenho cadastro</a>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>

    </main>

</body>
</html>