<?php
session_start();

require_once '../../config/database.php';
require_once '../../models/Usuario.php';

if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit;
}

$database = new Database();
$db = $database->connect();

$dbUser = new Usuario($db);

$user = $dbUser->selectEmail($_SESSION['username']);

if(!$user){
    session_destroy();
    header("Location: ../auth/login.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| EXEMPLOS DE DADOS
|--------------------------------------------------------------------------
| Depois você pode substituir pelos dados do banco
*/
$totalProdutos = 120;
$baixoEstoque = 8;
$totalCategorias = 6;
$totalValor = "R$ 15.450,00";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold"
           href="#">
            EstoqueWEB
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item me-lg-3">
                    <span class="text-light">
                        Olá,
                        <?= $user['nome']; ?>
                    </span>
                </li>
                <li class="nav-item">
                    <form action="../auth/logout.php" method="POST">
                        <button type="submit"
                                class="btn btn-danger btn-sm">
                            Sair
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTEÚDO -->
<div class="container py-5">
    <!-- TÍTULO -->
    <div class="mb-5">
        <h1 class="fw-bold">
            Dashboard
        </h1>
        <p class="text-muted">
            Controle e gerenciamento do estoque
        </p>
    </div>
    <!-- CARDS -->
    <div class="row g-4 mb-5">
        <!-- Produtos -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">
                        Produtos
                    </h6>
                    <h2 class="fw-bold">
                        <?= $totalProdutos; ?>
                    </h2>
                </div>
            </div>
        </div>
        <!-- Baixo estoque -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">
                        Baixo Estoque
                    </h6>
                    <h2 class="fw-bold text-danger">
                        <?= $baixoEstoque; ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Categorias -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">
                        Categorias
                    </h6>
                    <h2 class="fw-bold">
                        <?= $totalCategorias; ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Valor total -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">
                        Valor em Estoque
                    </h6>
                    <h2 class="fw-bold text-success">
                        <?= $totalValor; ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- AÇÕES -->
    <div class="row g-4">
        <!-- Produtos -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h4 class="mb-3">
                        Produtos
                    </h4>
                    <p class="text-muted">
                        Gerencie os produtos do estoque.
                    </p>
                    <a href="../produtos/index.php" class="btn btn-primary w-100">
                        Acessar
                    </a>
                </div>
            </div>
        </div>
        <!-- Categorias -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h4 class="mb-3">
                        Categorias
                    </h4>
                    <p class="text-muted">
                        Organize os produtos por categoria.
                    </p>
                    <a href="../categorias/index.php" class="btn btn-dark w-100">
                        Acessar
                    </a>
                </div>
            </div>
        </div>
        <!-- Relatórios -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h4 class="mb-3">
                        Relatórios
                    </h4>
                    <p class="text-muted">
                        Visualize relatórios e estatísticas.
                    </p>
                    <a href="#" class="btn btn-success w-100">
                        Visualizar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>