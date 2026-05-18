<?php

namespace app\controllers;

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController{
    private \Usuario $usuario;

    public function __construct(){
        $database = new \Database();
        $db = $database->connect();
        $this->usuario = new \Usuario($db);
    }

    public function login(): void{
        $mensagem = $_SESSION['mensagem'] ?? '';
        $tipo = $_SESSION['tipo'] ?? '';

        unset($_SESSION['mensagem'], $_SESSION['tipo']);

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate(): void{
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        try {
            $user = $this->usuario->selectEmail($email);

            if ($user && password_verify($senha, $user['senha'])) {
                $_SESSION['usuario_id'] = $user['id'];
                $_SESSION['usuario_nome'] = $user['nome'];
                $_SESSION['username'] = $user['email'];

                header('Location: ' . app_url('/dashboard'));
                exit;
            }

            $_SESSION['mensagem'] = 'Email ou senha inválidos';
            $_SESSION['tipo'] = 'danger';

            header('Location: ' . app_url('/login'));
            exit;
        } catch (\Exception $e) {
            $_SESSION['mensagem'] = 'Erro: ' . $e->getMessage();
            $_SESSION['tipo'] = 'danger';

            header('Location: ' . app_url('/login'));
            exit;
        }
    }

    public function logout(): void{
        $_SESSION = [];
        session_destroy();

        header('Location: ' . app_url('/login'));
        exit;
    }
}
