<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workflex";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$tarefaId = 1;

$sql = "UPDATE Tarefa SET Status_Tarefa = 1 WHERE id_Tarefa = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tarefaId);

if ($stmt->execute()) {
    echo "<script>alert('Tarefa concluída com sucesso!'); window.location.href = './alongamento.html';</script>";
} else {
    echo "<script>alert('Erro ao concluir a tarefa. Por favor, tente novamente.'); window.location.href = './alongamento.html';</script>";
}

$stmt->close();
$conn->close();

?>