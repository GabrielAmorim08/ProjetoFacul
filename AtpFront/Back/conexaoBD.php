<?php

$servername = "localhost"; // define o endereço de acesso do MySQL: equipamento local 
$username = "root";        // define o usuário de BD para acesso: root é o usuário padrão
$password = "";            // define a senha de acesso do usuário: padrão é senha vazia
$dbname = "db_lojahardware";     // define a base de dados a ser acessada
   
// Cria a conexão 
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a criação da conexão foi bem sucedida
if (!$conn) {  // Se a conexão não foi criada, encerra a execução do PHP com a mensagem de erro.
  die("Falha de conexão: " . mysqli_connect_error());
}
echo "Conexão bem sucedida!";
?>