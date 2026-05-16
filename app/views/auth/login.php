<?php
session_start();
require_once '../../config/database.php';
require_once '../../models/Usuario.php';

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$mensagem = "";
$tipo = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user;

    try{

       $user = $dbUser->selectEmail($email);

        if($user){
            if(password_verify($senha, $user['senha'] )){
                $_SESSION['username'] = $email;
                $mensagem = "Login realizado com sucesso!";
                $tipo = "success";
                header("refresh:0;url=../dashboard");
                exit;
            } else{
                $mensagem = "Senha incorreta";
                $tipo = "danger";
            }
        } else{
            $mensagem = "Usuário não encontrado!";
            $tipo = "warning";
        }
    } catch(Exception $e){
        echo "Erro: ". $e->getMessage();
    }
}

?>

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
                    <h2 class="text-center mb-4">
                        Login
                    </h2>
                     <?php if(!empty($mensagem)): ?>
                    <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
                    <?= $mensagem ?>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                    </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="Digite seu email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Senha
                            </label>
                            <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100">
                            Entrar
                        </button>
                    </form>
                    <p class="text-center mt-4 mb-0">
                        <a href="register.php" class="text-decoration-none">
                            Cadastro
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>