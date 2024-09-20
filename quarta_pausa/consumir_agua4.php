<?php
include '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantia = 400; 
    $idUsuario = 1; 

    $sql = "SELECT consumo FROM Agua WHERE Usuario_idUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->bind_result($consumo_atual);
    $stmt->fetch();
    $stmt->close();

    $novo_consumo = $consumo_atual + $quantia;

    $sql_update = "UPDATE Agua SET consumo = ? WHERE Usuario_idUsuario = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ii", $novo_consumo, $idUsuario);

    if ($stmt_update->execute()) {
        echo "<script>alert('Consumo de água atualizado com Sucesso!'); window.location.href = './aviso.html';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar consumo. Por favor, tente novamente mais tarde.'); window.location.href = './aviso.html';</script>";
    }

    $stmt_update->close();
} else {
    echo "Erro: Formulário não enviado corretamente!";
}

$conn->close();
?>
