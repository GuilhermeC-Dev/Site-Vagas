<?php
$host = "localhost";
$usuario = "root"; // seu usuário do MySQL
$senha = "";       // sua senha do MySQL
$banco = "vagasdev";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>