<?php
include '../db_connection.php';

// Definir o ID da tarefa
$tarefaId = 1;

// Atualizar o status da tarefa no banco de dados
$sql = "UPDATE Tarefa SET Status_Tarefa = 1 WHERE id_Tarefa = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $tarefaId);

if ($stmt->execute()) {
    echo "<script>alert('Tarefa concluída com sucesso!'); window.location.href = './meditacao.html';</script>";
} else {
    echo "<script>alert('Erro ao concluir a tarefa. Por favor, tente novamente.'); window.location.href = './alongamento.html';</script>";
}

$stmt->close();
$conn->close();
?>
