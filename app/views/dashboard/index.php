<?php
session_start();
require_once '../../config/database.php';
require_once '../../models/Usuario.php';

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$user = $dbUser->selectEmail($_SESSION['username']);

if($_SESSION['username'] != $user['email']){
    header("Location: ../auth/login.php");
    exit;
}

echo "Bem vindo {$user['nome']}";
var_dump($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../auth/logout.php">
        <input type="submit" value="Sair">
    </form>
</body>
</html>