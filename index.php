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


?>