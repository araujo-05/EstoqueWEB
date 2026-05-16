<?php
session_start();
require_once '../config/database.php';
require_once '../models/Usuario.php';

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user;

    try{

       $user = $dbUser->selectEmail($email);

        if($user){
            if(password_verify($senha, $user['senha'] )){
                $_SESSION['username'] = $email;
                header("Location: ../views/dashboard");
                exit;
            } else{
               echo "senha incorreta";
            }
        } else{
            echo "usuario não encontrado";
        }
    } catch(Exception $e){
        echo "Erro: ". $e->getMessage();
    }
}
?>