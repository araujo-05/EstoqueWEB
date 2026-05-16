<?php
session_start();
require_once '../config/database.php';
require_once '../models/Usuario.php';

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$mensagem = "";
$tipo = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user;

    try{

       $user = $dbUser->selectEmail($email);

        if($user){
            if(password_verify($senha, $user['senha'] )){
                $_SESSION['username'] = $email;
                $mensagem = "Login realizado com sucesso!";
                $tipo = "success";
                header("refresh:2;url=../views/dashboard");
                exit;
            } else{
                $mensagem = "Senha incorreta";
                $tipo = "danger";
            }
        } else{
            $mensagem = "Usuário não encontrado!";
            $tipo = "warning";
        }
    } catch(Exception $e){
        echo "Erro: ". $e->getMessage();
    }
}
?>