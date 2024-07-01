
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

// Verificar se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ler o corpo da requisição
    $json = file_get_contents('php://input');
    // Decodificar o JSON em um array associativo
    $data = json_decode($json, true);

    // Verificar se a decodificação foi bem-sucedida
    if ($data !== null && isset($data['nome'])) {
        $nome = $data['nome'];

        // Criar a consulta SQL com um parâmetro para evitar injeção de SQL
        $sql = "SELECT * FROM usuarios WHERE nome LIKE ?";
        
        // Preparar e vincular
        $stmt = $conn->prepare($sql);
        $search = "%".$nome."%";
        $stmt->bind_param("s", $search);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $usuarios = [];
            
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
            
            // Responder com os resultados da pesquisa
            echo json_encode(['status' => 'ok', 'usuarios' => $usuarios]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao executar a consulta: ' . $stmt->error]);
        }
        
        // Fechar a declaração
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dados de entrada inválidos']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
}

// Fechar a conexão
$conn->close();
?>
