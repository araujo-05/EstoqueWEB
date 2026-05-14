<?php
require_once 'app/config/database.php';

$database = new Database();

$conn = $database->connect();

echo "banco conectado";
?>