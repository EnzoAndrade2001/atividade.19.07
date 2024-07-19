<?php
// Configuração de conexão com o banco de dados
$servername = "localhost"; // Host do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "test_db"; // Nome do banco de dados que você está usando

// Criação de conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Restante do seu código PHP para manipulação do banco de dados
// ...

// Ao final do uso, não esqueça de fechar a conexão
$conn->close();
?>
