<?php

// Verifica se o formulário foi submetido usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $sexo = $_POST['sexo'];
    $tipoFuncionario = $_POST['funcionario-tipo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include '../db_connection.php';

    // Converter altura para formato decimal (4,2)
    $altura = number_format((float) str_replace(',', '.', $altura), 2, '.', '');

    // Verifica se o email já existe na tabela Usuario
    $query = "SELECT email FROM Usuario WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o e-mail já está cadastrado
    if ($result->num_rows > 0) {
        echo "<script>alert('E-mail já cadastrado. Tente novamente!'); window.location.href = './cadastro.html';</script>";
    } else {
        // Insere os dados na tabela Usuario
        $sql = "INSERT INTO Usuario (nome, idade, altura, peso, sexo, Tipo_Usuario_idTipoUsuario, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siississ", $nome, $idade, $altura, $peso, $sexo, $tipoFuncionario, $email, $senha);

        // Executa a query de inserção
        if ($stmt->execute()) {
            // Redireciona para a página de login após cadastro
            echo "<script>alert('Usuário Cadastrado com Sucesso!'); window.location.href = '../index.html';</script>";
        } else {
            // Mensagem de erro em caso de falha ao cadastrar usuário
            echo "<script>alert('Erro ao cadastrar usuário. Por favor, tente novamente mais tarde.'); window.location.href = './cadastro.html';</script>";
        }
    }

    // Fecha as operações preparadas e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
