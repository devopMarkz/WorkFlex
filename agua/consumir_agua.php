<?php

include '../db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantia = isset($_POST['agua-ml']) ? intval($_POST['agua-ml']) : 0;
    $idUsuario = 1;

    if ($quantia > 0) {
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
            echo "<script>alert('Consumo de água atualizado com sucesso!'); window.location.href = './agua.html';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar o consumo. Tente novamente mais tarde.'); window.location.href = './agua.html';</script>";
        }

        $stmt_update->close();
    } else {
        echo "<script>alert('Por favor, insira uma quantidade válida de água.'); window.location.href = './agua.html';</script>";
    }
} else {
    echo "Erro: Formulário não enviado corretamente!";
}

$conn->close();
?>
