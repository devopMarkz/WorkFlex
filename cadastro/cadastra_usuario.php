<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $sexo = $_POST['sexo'];
    $tipoFuncionario = $_POST['funcionario-tipo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include '../db_connection.php';

    $altura = number_format((float) str_replace(',', '.', $altura), 2, '.', '');

    $query = "SELECT email FROM Usuario WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('E-mail já cadastrado. Tente novamente!'); window.location.href = './cadastro.html';</script>";
    } else {
        $sql = "INSERT INTO Usuario (nome, idade, altura, peso, sexo, Tipo_Usuario_idTipoUsuario, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siississ", $nome, $idade, $altura, $peso, $sexo, $tipoFuncionario, $email, $senha);

        if ($stmt->execute()) {
            echo "<script>alert('Usuário Cadastrado com Sucesso!'); window.location.href = '../index.html';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar usuário. Por favor, tente novamente mais tarde.'); window.location.href = './cadastro.html';</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
