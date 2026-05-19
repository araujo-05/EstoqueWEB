<?php

namespace app\controllers;

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController{
    private \Usuario $usuario;
    private \PDO $db;
    private \Usuario $sessionUser;

    public function __construct() {
         $database = new \Database();
        $this->db = $database->connect();
        $this->usuario = new \Usuario($this->db);
    }

    public function index(): void{
        $usuarios = $this->usuario->showAll();
        $user = $this->usuario->selectEmail($_SESSION['username']);

        require_once __DIR__ . '/../views/usuarios/index.php';
    }

    public function form(): void{
        $user = $this->usuario->selectEmail($_SESSION['username']);
        require_once __DIR__.'/../views/usuarios/create.php';
    }
}

?>
