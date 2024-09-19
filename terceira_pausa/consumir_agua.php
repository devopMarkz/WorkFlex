<?php
include '../db_connection.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os valores enviados no formulário
    $quantia = $_POST['quantia']; // Quantidade de água enviada pelo formulário (400 ml)
    $idUsuario = $_POST['idUsuario']; // ID do usuário enviado pelo formulário

    // Buscar o consumo atual de água do usuário no banco de dados
    $query = "SELECT consumo FROM Agua WHERE Usuario_idUsuario = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->bind_result($consumo_atual);
    $stmt->fetch();
    $stmt->close();

    // Somar os 400 ml ao consumo atual
    $novo_consumo = $consumo_atual + $quantia;

    // Atualizar o consumo de água no banco de dados
    $query_update = "UPDATE Agua SET consumo = ? WHERE Usuario_idUsuario = ?";
    $stmt_update = $mysqli->prepare($query_update);
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

$mysqli->close();
?>
