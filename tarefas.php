<?php
// Conexão com o banco de dados
$servername = "localhost";
$database = "Tarefausu";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    // Inserir os dados na tabela de usuários
    $sql = "INSERT INTO tbl_tarefas (tar_setor, tar_prioridade, tar_descricao, tar_status) VALUES ('$setor', '$prioridade', '$descricao', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Tarefa cadastrado com sucesso!'); window.location='tarefas.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar tarefa: " . mysqli_error($conn) . "');</script>";
    }
}

// Consultar todos os usuários
$sql = "SELECT * FROM tbl_usuarios";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        h1 {
            color: white;
            padding-left: 20px;
            padding-top: 0px;
            margin: 0;
        }
        .container {
            background-color: blue;
            height: 60px;
            width: 80%;
            margin-top: 10px;
            margin-left: 9%;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        nav {
            display: flex;
            gap: 20px; 
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: 5px;
            background-color: red;
        }
        a:hover {
            color: blue;
        }
        .formContainer {
            max-width: auto;
            margin: 0px 0px 20px 0px;
            padding: 17px;
            background-color: #fff;
            border-radius: 7px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: relative;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        fieldset {
            margin-bottom: 20px;
            color: blue;
        }
        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 16px;
            color: blue;
        }
        .btn:hover {
            color: blue;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btn {
            padding: 5px 10px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .action-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Tarefas</h1>
            <nav>
                <a href="index.php">Página Inicial</a>
                <a href="usuarios.php">Usuários</a>
                <a href="tarefas.php">Tarefas</a>
                <a href="gerenciar.php">Gerenciar Tarefa</a>
            </nav>
        </div>
    </header>

    <div class="formContainer">
        <h1>Cadastro de tarefas</h1>
        <form method="POST" action="tarefas.php" id="POST">
            <fieldset>
                <label style="font-size: 18.7px">Cadastro de Tarefas</label><br><br>
                <input type="hidden" id="id" name="id">
                <label for="setor">Setor</label>
                <input type="text" id="setor" name="setor" placeholder="Digite o setor" autofocus required>
                <label for="prioridade">Prioridade</label>
                <select id="prioridade" name="prioridade" required>
                <option value="baixa">Baixa</option>
                <option value="média">Média</option>
                <option value="alta">Alta</option>
                </select>
                <br><br>
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Descreva a tarefa" required>
                <label for="status">Status</label>
                <input type="text" id="status" name="status" placeholder="Informe o status" required>
                <input type="submit" value="Cadastrar" class="btn" style="font-size: 16px">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
// Fechar a conexão
mysqli_close($conn);
?>