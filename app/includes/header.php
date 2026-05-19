<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= app_url('/dashboard') ?>">EstoqueWEB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item me-lg-3">
                        <span class="text-light">Olá, <?= $user['nome']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="<?= app_url('/logout') ?>" class="btn btn-danger btn-sm">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    <div class="container py-5">