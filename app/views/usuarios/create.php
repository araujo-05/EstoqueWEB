<?php
?>
<?php require_once __DIR__.'/../../includes/header.php';?>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-3">
                            <a href="<?= app_url('/dashboard') ?>" class="btn btn-secondary">Voltar</a>
                        </div>
                        <h2 class="text-center mb-4">
                            Criar Conta
                        </h2>
                        <form action="../../controllers/RegisterController.php" method="POST">
                            <!-- Nome -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Nome
                                </label>
                                <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                            </div>
                            <!-- Senha -->
                            <div class="mb-4">

                                <label class="form-label">
                                    Senha
                                </label>

                                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
                            </div>
                            <!-- Botão -->
                            <button type="submit" name="register" class="btn btn-primary w-100 py-2">
                                Cadastrar
                            </button>
                        </form>
                        <!-- Link login -->
                        <!--<p class="text-center mt-4 mb-0">
                            Já possui conta?
                            <a href="../auth/login.php" class="text-decoration-none">
                                Fazer login
                            </a>
                        </p>-->
                    </div>
                </div>
            </div>
        </div>
    <?php require_once __DIR__. '/../../includes/footer.php';?>