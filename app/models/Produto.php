<?php

class Produto {

    private $conn;
    private $table = "produtos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($nome, $descricao, $quantidade, $preco, $categoriaId) {
        $query = "INSERT INTO {$this->table} (nome, descricao, quantidade, preco, categoria_id)
        VALUES (:nome, :descricao, :quantidade, :preco, :categoria_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam("categoria_id", $categoriaId);

        return $stmt->execute();
    }
    public function listar() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}