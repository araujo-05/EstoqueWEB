<?php

class Usuario{
    private $conn;
    private $table = "usuarios";

    public function __construct($db){
        $this->conn = $db;
    }

    public function create($nome, $email, $senha){
        $query= "INSERT INTO {$this->table} (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senhaHash);

        return $stmt->execute();
    }
}

?>