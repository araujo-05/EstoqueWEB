<?php
$totalProdutos = 120;
$baixoEstoque = 8;
$totalCategorias = 6;
$totalValor = "R$ 15.450,00";
?>
<?php require_once __DIR__.'/../../includes/header.php';?>
    <div class="mb-5">
        <h1 class="fw-bold">Dashboard</h1>
        <p class="text-muted">Controle e gerenciamento do estoque</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">Produtos</h6>
                    <h2 class="fw-bold"><?= $totalProdutos; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">Baixo Estoque</h6>
                    <h2 class="fw-bold text-danger"><?= $baixoEstoque; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">Categorias</h6>
                    <h2 class="fw-bold"><?= $totalCategorias; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h6 class="text-muted">Valor em Estoque</h6>
                    <h2 class="fw-bold text-success"><?= $totalValor; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h4 class="mb-3">Produtos</h4>
                    <p class="text-muted">Gerencie os produtos do estoque.</p>
                    <a href="<?= app_url('/produto') ?>" class="btn btn-primary w-100">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h4 class="mb-3">Usuários</h4>
                    <p class="text-muted">Gerencie os Usuários.</p>
                    <a href="<?= app_url('/usuario') ?>" class="btn btn-primary w-100">Acessar</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__. '/../../includes/footer.php';?>
