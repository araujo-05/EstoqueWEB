<?php
session_start();
require_once '../../config/database.php';
require_once '../../models/Usuario.php';

if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit;
}

$database = new Database();
$db = $database->connect();
$dbUser = new Usuario($db);
$user = $dbUser->selectEmail($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">
    <div class="text-left mb-3">
        <a href="../dashboard" class="btn btn-secondary">
            ← Voltar
        </a>
    </div>
    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            Lista de Produtos
        </h2>

        <a href="create.php"
           class="btn btn-primary">

            Novo Produto

        </a>

    </div>

    <!-- Card -->
    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <!-- Responsividade -->
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
                            <th class="text-center">
                                Ações
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <!--<tr>
                            <td>1</td>
                            <td>Mouse Gamer</td>
                            <td>
                                Mouse RGB com 6 botões
                            </td>
                            <td>10</td>
                            <td>
                                R$ 150,00
                            </td>
                            <td>
                                Periféricos
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    Excluir
                                </a>
                            </td>
                        </tr> -->
                        <?php

                            $produtos;
                            $query = "SELECT 
                                        produtos.id, 
                                        produtos.nome AS nome_produto, 
                                        categorias.nome AS nome_categoria,
                                        produtos.descricao,
                                        produtos.quantidade,
                                        produtos.preco
                                    FROM produtos
                                    INNER JOIN categorias ON produtos.categoria_id = categorias.id;";
                            $stmt = $db->prepare($query);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                echo"<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['nome_produto']}</td>
                                        <td>
                                            {$row['descricao']}
                                        </td>
                                        <td>{$row['quantidade']}</td>
                                        <td>
                                            {$row['preco']}
                                        </td>
                                        <td>
                                            {$row['nome_categoria']}
                                        </td>
                                        <td class='text-center'>
                                            <a href='edit.php' class='btn btn-sm btn-warning'>
                                                Editar
                                            </a>
                                            <a href='excluir.php' class='btn btn-sm btn-danger'>
                                                Excluir
                                            </a>
                                        </td>
                                    </tr>";
                            }     
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>