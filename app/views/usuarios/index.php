<?php require_once __DIR__.'/../../includes/header.php';?>
        <div class="text-left mb-3">
            <a href="<?= app_url('/dashboard') ?>" class="btn btn-secondary">Voltar</a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Produtos</h2>
            <a href="<?= app_url('/usuario/create') ?>" class="btn btn-primary">Novo Produto</a>
        </div>

        <div class="card shadow border-0 rounded-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $row): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nome'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php require_once __DIR__. '/../../includes/footer.php';?>
