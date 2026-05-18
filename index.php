<?php
require_once 'app/config/database.php';

if(!isset($_SESSION['username'])){
    header("Location: views/auth/login.php");
}
?>