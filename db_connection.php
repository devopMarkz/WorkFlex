<?php
// db_connection.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workflex";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>