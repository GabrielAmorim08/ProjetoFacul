<?php
$servername = "localhost"; // define o endereço de acesso do MySQL: equipamento local 
$username = "root";        // define o usuário de BD para acesso: root é o usuário padrão
$password = "";            // define a senha de acesso do usuário: padrão é senha vazia
$dbname = "db_lojahardware";     // define a base de dados a ser acessada
// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a criação da conexão foi bem sucedida
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha de conexão: " . $conn->connect_error]));
}

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $senha = $_GET['senha'];
    $data = new DateTime();
    $data_criacao = $data->format('yyy-MM-dd H:i:s');

    // Consulta SQL para inserir usuário
    $sql = "INSERT INTO usuarios (nome, email, senha,telefone,data_criacao,id ) VALUES (?, ?, ?, ?,?,UUID())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $nome, $email, $senha,$telefone,$data_criacao);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'ok', 'message' => 'Usuário cadastrado com sucesso']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar usuário: ' . $stmt->error]);
    }

    // Fechar a declaração e a conexão
    $stmt->close();

// Fechar a conexão
$conn->close();
?>

