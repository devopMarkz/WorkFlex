<?php

// Verifica se os campos foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $email = $_POST["email"]; // Captura o email do formulário
    $senha = $_POST["senha"]; // Captura a senha do formulário

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workflex";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    // Consulta para buscar o usuário pelo email (ajuste no nome da coluna)
    $sql = "SELECT * FROM Usuario WHERE Email = ?"; // Campo 'Email' com letra maiúscula
    $stmt = $conn->prepare($sql); // Preparação da consulta
    $stmt->bind_param("s", $email); // liga o parâmetro $email ao placeholder ? na consulta SQL
    $stmt->execute(); // A declaração SQL preparada é executada no banco de dados.
    $result = $stmt->get_result(); // Armazena as linhas obtidas da consulta

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc(); // Se o usuário foi encontrado, extraímos os dados dele

        // Verifica a senha
        if ($senha === $usuario['Senha']) {
            session_start();
            $_SESSION['email'] = $email;
            // Senha correta - redirecionar para a página "alongamento.html" com caminho relativo
            header("Location: ./alongamento/alongamento.html");
            exit();
        } else {
            // Senha incorreta
            echo "<script>alert('Senha incorreta. Tente novamente!');</script>";
            echo('<meta http-equiv="refresh" content="0;url=index.html">');
        }
    } else {
        // Usuário não encontrado
        echo "<script>alert('Usuário não encontrado!');</script>";
        echo('<meta http-equiv="refresh" content="0;url=index.html">');
    }

    // Fechar conexão
    $stmt->close();
    $conn->close();
}

?>
