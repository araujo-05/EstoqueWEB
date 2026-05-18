<?php

class Produto {

    private $conn;
    private $table = "produtos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($dados) {
        $query = "INSERT INTO {$this->table} (nome, descricao, quantidade, preco, categoria_id)
        VALUES (:nome, :descricao, :quantidade, :preco, :categoria_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $dados['nome']);
        $stmt->bindParam(":descricao", $dados['descricao']);
        $stmt->bindParam(":quantidade", $dados['quantidade']);
        $stmt->bindParam(":preco", $dados['preco']);
        $stmt->bindParam(":categoria_id", $dados['categoriaId']);

        return $stmt->execute();
    }
    public function update($dados){
        $query = "UPDATE {$this->table} 
                SET nome = :nome, descricao = :descricao, quantidade = :quantidade, preco = :preco, categoria_id = :categoria_id
                wHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $dados['nome']);
        $stmt->bindParam(":descricao", $dados['descricao']);
        $stmt->bindParam(":quantidade", $dados['quantidade']);
        $stmt->bindParam(":preco", $dados['preco']);
        $stmt->bindParam(":categoria_id", $dados['categoriaId']);
        $stmt->bindParam(":id", $dados['id']);

        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM {$this->table} wHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function findById($id){
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function showAll() {
        $query = "SELECT 
                    produtos.id, 
                    produtos.nome AS nome_produto, 
                    categorias.nome AS nome_categoria,
                    produtos.descricao,
                    produtos.quantidade,
                    produtos.preco
                FROM produtos
                INNER JOIN categorias ON produtos.categoria_id = categorias.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}
