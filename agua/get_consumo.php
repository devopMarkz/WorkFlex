<?php
// get_consumo.php

include '../db_connection.php';

// Supondo que o ID do usuário seja 1. Caso tenha o ID dinâmico, pode receber via POST ou GET.
$usuario_id = 1;

// Query para obter o consumo de água do usuário
$sql = "SELECT consumo FROM Agua WHERE Usuario_idUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

// Retornar o consumo em formato JSON
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['consumo' => $row['consumo']]);
} else {
    echo json_encode(['consumo' => 0]);
}

$stmt->close();
$conn->close();
?>
