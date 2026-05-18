<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="text-left mb-3">
        <a href="<?= app_url('/dashboard') ?>" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lista de Produtos</h2>
        <a href="<?= app_url('/produto/create') ?>" class="btn btn-primary">Novo Produto</a>
    </div>

    <div class="card shadow border-0 rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $row): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nome_produto'] ?></td>
                                <td><?= $row['descricao'] ?></td>
                                <td><?= $row['quantidade'] ?></td>
                                <td><?= $row['preco'] ?></td>
                                <td><?= $row['nome_categoria'] ?></td>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
