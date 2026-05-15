<?php

require_once '../config/database.php';
require_once '../models/Usuario.php';

$database = new Database();
$db = $database->connect();
$user = new Usuario($db);

if(isset($_POST['register'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($user->create($nome, $email, $senha)) {
        echo "<script>alert('Usuário cadastrado')</script>";
        header("location: ../views/auth/register.php");
    } else {
        echo "<script>alert('Erro')</script>";
        header("location: ../views/auth/register.php");
    }
}