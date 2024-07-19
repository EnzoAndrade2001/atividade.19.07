<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso!</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Sucesso!</h1>
    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<p>" . $_SESSION['success_message'] . "</p>";
        unset($_SESSION['success_message']); // Limpa a mensagem da sessão
    } else {
        echo "<p>Operação concluída com sucesso.</p>";
    }
    ?>
    <a href="atividade.php">Voltar para a lista de usuários</a>
</body>
</html>
