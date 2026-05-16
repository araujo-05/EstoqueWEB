<?php
session_start();
require_once 'app/config/database.php';
require_once 'app/models/Usuario.php';

if($_SESSION['username'] == null ){
    header("Location: app/views/auth/login.php");
    exit;
} else{
     header("Location: app/views/dashboard/");
    exit;
}

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$user = $dbUser->selectEmail($_SESSION['username']);

var_dump($_SESSION['username']);

?>