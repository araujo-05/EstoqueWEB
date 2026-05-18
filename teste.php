<?php

$database = new Database();
$db = $database->connect();

 $query= "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $db->prepare($query);

        $senhaHash = password_hash("negaodemais", PASSWORD_DEFAULT);

        $stmt->bindParam(":nome", "Admin");
        $stmt->bindParam(":email", "admin@admin");
        $stmt->bindParam(":senha", $senhaHash);

    $stmt->execute();

?>