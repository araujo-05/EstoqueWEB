<?php
session_start();
require_once '../../config/database.php';
require_once '../../models/Usuario.php';
require_once '../../models/Produto.php';

if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit;
}

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$user = $dbUser->selectEmail($_SESSION['username']);
$prod = new Produto($db);
$mensagem = "";
$tipo = "";

if(isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria_id'];

    if($prod->create($nome, $descricao, $quantidade, $preco, $categoria)) {
        $mensagem = "Produto Cadastrado";
        $tipo="success";
    } else {
        $mensagem = "Erro";
        $tipo = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-3">
                        <a href="index.php" class="btn btn-secondary">
                            ← Voltar
                        </a>
                    </div>
                    <h2 class="text-center mb-4">
                        Cadastro de Produto
                    </h2>
                    <?php if(!empty($mensagem)): ?>
                        <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
                            <?= $mensagem ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button>
                        </div>
                    <?php endif; ?>
                    <form action="create.php" method="POST">
                        <!-- Nome -->
                        <div class="mb-3">
                            <label class="form-label">
                                Nome do Produto
                            </label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do produto" required>
                        </div>
                        <!-- Descrição -->
                        <div class="mb-3">
                            <label class="form-label">
                                Descrição
                            </label>
                            <textarea name="descricao" class="form-control" rows="4" placeholder="Digite a descrição do produto" required>
                            </textarea>
                        </div>
                        <!-- Quantidade -->
                        <div class="mb-3">
                            <label class="form-label">
                                Quantidade
                            </label>
                            <input type="number" name="quantidade" class="form-control" placeholder="Digite a quantidade" required>
                        </div>
                        <!-- Preço -->
                        <div class="mb-3">
                            <label class="form-label">
                                Preço
                            </label>
                            <input type="number" step="0.01" name="preco" class="form-control" placeholder="Digite o preço" required>
                        </div>
                        <!-- Categoria -->
                        <div class="mb-4">
                            <label class="form-label">
                                Categoria
                            </label>
                            <select name="categoria_id" class="form-select" required>
                               <option value="">
                                    Selecione uma categoria
                                </option>
                               <!--<option value="1">
                                    Informática
                                </option>
                                <option value="2">
                                    Escritório
                                </option>
                                <option value="3">
                                    Periféricos
                                </option>-->

                                <?php
                                
                                    $categorias;
                                    $query = "SELECT * FROM categorias";
                                    $stmt = $db->prepare($query);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                        echo"<option value=".$row["id"].">
                                                {$row["nome"]}
                                            </option>";
                                    }     
                                ?>
                            </select>
                            <?php //var_dump($categorias);?>
                        </div>
                        <!-- Botão -->
                        <button type="submit" name="cadastrar" class="btn btn-primary w-100 py-2">
                            Cadastrar Produto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>