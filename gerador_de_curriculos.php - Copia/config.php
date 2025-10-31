<?php
// Configurações do banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'curriculo_a';

// Criar conexão
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
} else {
    // echo "Conexão efetuada com sucesso!";
}
?>