<?php
require_once 'app/config/database.php';

if(!isset($_SESSION['username'])){
    header("Location: app/views/auth/login.php");
}
?>