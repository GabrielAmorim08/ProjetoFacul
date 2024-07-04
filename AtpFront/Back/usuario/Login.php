
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lojahardware";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE nome = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if ($usuario['senha'] == $senha && $usuario['nome'] == $nome) {
        echo json_encode(['status' => 'ok', 'usuario' => 'senha correta']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'senha incorreta']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Usuario nao encontrado']);
}

$stmt->close();
$conn->close();
?>
