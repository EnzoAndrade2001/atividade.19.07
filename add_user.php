<?php
session_start();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'test_db');
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Coleta os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Inserir o novo usuário no banco de dados
    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Usuário adicionado com sucesso.";
    } else {
        $_SESSION['error_message'] = "Erro ao adicionar usuário: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirecionar para a página de sucesso
    header('Location: sucess.php');
    exit();
}
?>

