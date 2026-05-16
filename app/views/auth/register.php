<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
</head>

<body>

    <h1>Cadastro</h1>

    <form method="POST" action="../../controllers/RegisterController.php">

        <input type="text" name="nome" placeholder="Nome">

        <input type="email" name="email" placeholder="Email">

        <input type="password" name="senha" placeholder="Senha">

        <button type="submit" name="register">
            Cadastrar
        </button>

    </form>

</body>

</html>