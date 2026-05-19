<?php require_once __DIR__.'/../../includes/header.php';?>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-3">
                        <a href="<?= app_url('/produto') ?>" class="btn btn-secondary">Voltar</a>
                    </div>

                    <h2 class="text-center mb-4">Cadastro de Produto</h2>

                    <?php if (!empty($mensagem)): ?>
                        <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
                            <?= $mensagem ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= app_url('/produto') ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nome do Produto</label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do produto" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="descricao" class="form-control" rows="4" placeholder="Digite a descrição do produto" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control" placeholder="Digite a quantidade" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preço</label>
                            <input type="number" step="0.01" name="preco" class="form-control" placeholder="Digite o preço" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Categoria</label>
                            <select name="categoria_id" class="form-select" required>
                                <option value="">Selecione uma categoria</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['id'] ?>">
                                        <?= $categoria['nome'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" name="cadastrar" class="btn btn-primary w-100 py-2">
                            Cadastrar Produto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__. '/../../includes/footer.php';?>
