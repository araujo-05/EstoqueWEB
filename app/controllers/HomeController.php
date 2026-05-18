<?php
namespace app\controllers;

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class HomeController{
    public function index(){
        $database = new \Database();
        $db = $database->connect();
        $dbUser = new \Usuario($db);
        $user = $dbUser->selectEmail($_SESSION['username']);

        if (!$user) {
            session_destroy();
            header('Location: ' . app_url('/login'));
            exit;
        }

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}
?>
