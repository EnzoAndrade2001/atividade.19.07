<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();

// Verificar se o ID do usuário foi passado via parâmetro GET
if (isset($_GET['id'])) {
    // Sanitizar o ID para garantir que seja um número inteiro válido
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id === false || $id <= 0) {
        $_SESSION['error_message'] = "ID de usuário inválido.";
    } else {
        // Conexão com o banco de dados
        $conn = new mysqli('localhost', 'root', '', 'test_db');
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Excluir o usuário do banco de dados
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Usuário excluído com sucesso.";
        } else {
            $_SESSION['error_message'] = "Erro ao excluir usuário: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    $_SESSION['error_message'] = "ID de usuário não especificado.";
}

// Redirecionar para a página de sucesso ou de volta para index.php em caso de erro
header('Location: sucesso_delete.php');
exit();
?>

