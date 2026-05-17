<?php
session_start();
require_once '../config/database.php';
require_once '../models/Usuario.php';

$database = new Database();
$db = $database->connect();
$user = new Usuario($db);
$mensagem = "";
$tipo = "";

if(isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    if($user->create($nome, $descricao, $quantidade, $preco, $categoria)) {
        echo "<script>alert('Usuário cadastrado')</script>";
        header("location: ../views/auth/register.php");
    } else {
        echo "<script>alert('Erro')</script>";
        header("location: ../views/auth/register.php");
    }
}