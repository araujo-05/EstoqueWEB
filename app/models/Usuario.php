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

    public function select(): array{
        $query="SELECT * FROM {$this->table} ";
        $stmt =  $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectEmail($email){
        $query="SELECT * FROM {$this->table} WHERE email = :email";
        $stmt =  $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return isset($resultados[0]) ? $resultados[0] : null;
    }
}

?>