<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-11 col-sm-8 col-md-6 col-lg-4">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Login</h2>

                    <?php if (!empty($mensagem)): ?>
                        <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
                            <?= $mensagem ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= app_url('/login') ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary w-100">
                            Entrar
                        </button>
                    </form>
                    <a href=<?php app_url("/create");?>></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
