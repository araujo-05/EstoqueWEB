<?php

namespace app\controllers;

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/Usuario.php';

class ProdutoController{
    private \Produto $produto;
    private \PDO $db;
    private \Usuario $sessionUser;

    public function __construct(){
        $database = new \Database();
        $this->db = $database->connect();
        $this->produto = new \Produto($this->db);
        $this->sessionUser = new \Usuario($this->db);
    }

    public function index(): void{
        $produtos = $this->produto->showAll();
        $user = $this->sessionUser->selectEmail($_SESSION['username']);

        require_once __DIR__ . '/../views/produtos/index.php';
    }

    public function form(): void{
        $categorias = $this->listarCategorias();
        $mensagem = $_SESSION['mensagem'] ?? '';
        $tipo = $_SESSION['tipo'] ?? '';

        unset($_SESSION['mensagem'], $_SESSION['tipo']);
        $user = $this->sessionUser->selectEmail($_SESSION['username']);

        require_once __DIR__ . '/../views/produtos/create.php';
    }

    public function create(): void{
        $dados = [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? '',
            'quantidade' => $_POST['quantidade'] ?? '',
            'preco' => $_POST['preco'] ?? '',
            'categoriaId' => $_POST['categoria_id'] ?? '',
        ];

        if ($this->produto->create($dados)) {
            header('Location: ' . app_url('/produto'));
            exit;
        }

        $_SESSION['mensagem'] = 'Erro ao cadastrar produto';
        $_SESSION['tipo'] = 'danger';

        header('Location: ' . app_url('/produto/create'));
        exit;
    }

    private function listarCategorias(): array{
        $stmt = $this->db->prepare('SELECT * FROM categorias');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
