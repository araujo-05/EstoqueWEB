<?php
session_start();
require_once '../../config/database.php';
require_once '../../models/Usuario.php';

if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit;
}

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$user = $dbUser->selectEmail($_SESSION['username']);

if(!$user){
    session_destroy();
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <h1>Bem vindo <?= $user['nome']; ?></h1>

    <form action="../auth/logout.php" method="POST">
        <input type="submit" value="Sair">
    </form>

</body>
</html>