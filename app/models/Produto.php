<?php

class Produto {

    private $conn;
    private $table = "produtos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {

        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}