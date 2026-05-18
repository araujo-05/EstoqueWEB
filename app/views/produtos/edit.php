<?php
require_once '../../config/database.php';

$database = new Database();
$db = $database->connect();

/* =========================
   BUSCAR PRODUTO PELO ID
========================= */
if (!isset($_GET['id'])) {
    die("ID do produto não informado.");
}

$id = $_GET['id'];

$query = "SELECT * FROM produtos WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <!-- Card -->
                <div class="card card-form">
                    <div class="card-body p-4 p-md-5">
                        <!-- Título -->
                        <div class="text-center mb-4">
                            <h2 class="page-title">
                                <i class="bi bi-pencil-square"></i>
                                Editar Produto
                            </h2>
                            <p class="text-muted">
                                Atualize as informações do produto abaixo.
                            </p>
                        </div>
                        <!-- Formulário -->
                        <form action="update.php" method="POST">
                            <!-- ID -->
                            <input type="hidden" name="id" value="<?= $produto['id']; ?>">
                            <div class="row">
                                <!-- Nome -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">
                                        Nome do Produto
                                    </label>
                                    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome']); ?>" placeholder="Digite o nome do produto" required>
                                </div>
                                <!-- Descrição -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">
                                        Descrição
                                    </label>

                                    <textarea name="descricao" class="form-control" rows="4" placeholder="Digite a descrição do produto" required><?= htmlspecialchars($produto['descricao']); ?></textarea>
                                </div>

                                <!-- Quantidade -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">
                                        Quantidade
                                    </label>
                                    <input type="number" name="quantidade" class="form-control" value="<?= $produto['quantidade']; ?>" placeholder="Digite a quantidade" required>
                                </div>

                                <!-- Preço -->
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">
                                        Preço
                                    </label>
                                    <input type="number" step="0.01" name="preco" class="form-control" value="<?= $produto['preco']; ?>" placeholder="Digite o preço" required>
                                </div>
                                <!-- Categoria -->
                                <div class="col-12 mb-4">
                                    <label class="form-label">
                                        Categoria
                                    </label>
                                    <select name="categoria_id" class="form-select" required>
                                        <option value="">
                                            Selecione uma categoria
                                        </option>
                                        <?php
                                            $queryCategorias = "SELECT * FROM categorias";
                                            $stmtCategorias = $db->prepare($queryCategorias);
                                            $stmtCategorias->execute();

                                            while ($categoria = $stmtCategorias->fetch(PDO::FETCH_ASSOC)) {
                                                $selected = ($categoria['id'] == $produto['categoria_id']) ? 'selected' : '';
                                                echo "
                                                    <option value='{$categoria['id']}' $selected>
                                                        {$categoria['nome']}
                                                    </option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Botões -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php" class="btn btn-outline-secondary px-4">
                                    <i class="bi bi-arrow-left"></i>
                                    Voltar
                                </a>
                                <button type="submit" name="editar" class="btn btn-success btn-save px-4">
                                    <i class="bi bi-check-circle"></i>
                                    Atualizar Produto
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
                <!-- Fim Card -->
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>