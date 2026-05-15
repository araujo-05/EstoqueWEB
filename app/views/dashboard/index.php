<?php
require_once '../../config/database.php';
require_once '../../models/Usuario.php';
$db = new Database();
$dbUser = new Usuario($db);
$user = $dbUser->selectEmail($_SESSION['username']);

echo "Bem vindo {$user['nome']}";
?>