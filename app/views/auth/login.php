<?php
session_start();
require_once '../../config/database.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form action="../../controllers/AuthController.php" method="POST">
        <h2>Login</h2>

        <input type="text" name="email" placeholder="E-mail" required>

        <input type="password" name="senha" placeholder="Senha" required>

        <button type="submit" name="login">Entrar</button>
    </form>

</body>
</html>