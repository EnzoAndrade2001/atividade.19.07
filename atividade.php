<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Cor de fundo */
            display: flex;
            justify-content: center; /* Centraliza conteúdo na horizontal */
            align-items: center; /* Centraliza conteúdo na vertical */
            height: 100vh; /* Utiliza toda a altura da tela */
            margin: 0;
        }
        .container {
            text-align: center; /* Centraliza o conteúdo dentro do container */
            padding: 20px;
            background-color: #fff; /* Fundo do container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        h1 {
            color: #007bff; /* Cor do título */
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff; /* Cor de fundo do cabeçalho da tabela */
            color: #fff; /* Cor do texto do cabeçalho da tabela */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Cor de fundo das linhas pares */
        }
        a {
            color: #007bff; /* Cor dos links */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Usuários</h1>
        
        <!-- Formulário de adicionar usuário -->
        <form action="add_user.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <button type="submit">Adicionar</button>
        </form>

        <!-- Tabela de lista de usuários -->
        <h2>Lista de Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o banco de dados
                $conn = new mysqli('localhost', 'root', '', 'test_db');
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                // Buscar os usuários
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><a href='delete_user.php?id=" . $row['id'] . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum usuário encontrado</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
