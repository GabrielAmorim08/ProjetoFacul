<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a criação da conexão foi bem sucedida
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha de conexão: " . $conn->connect_error]));
}

// Verificar se o método da requisição é GET e se há parâmetros
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['telefone']) && isset($_GET['senha'])) {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $senha = $_GET['senha'];
    $data = new DateTime();


    // Consulta SQL para inserir usuário
    $sql = "INSERT INTO usuarios (nome, email, senha,telefone,data_criacao ) VALUES (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $telefone, $senha,$data);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'ok', 'message' => 'Usuário cadastrado com sucesso']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar usuário: ' . $stmt->error]);
    }

    // Fechar a declaração e a conexão
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Parâmetros ausentes ou método não permitido']);
}

// Fechar a conexão
$conn->close();
?>

