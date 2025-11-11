<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'conexao.php';

// filtros opcionais (palavra-chave, tipo, localização)
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$tipo = isset($_GET['type']) ? $_GET['type'] : '';
$localizacao = isset($_GET['location']) ? $_GET['location'] : '';

$sql = "SELECT * FROM vagas WHERE 1";

if (!empty($keyword)) {
    $sql .= " AND (titulo LIKE '%$keyword%' OR empresa LIKE '%$keyword%' OR descricao LIKE '%$keyword%')";
}

if (!empty($tipo)) {
    $sql .= " AND tipo = '$tipo'";
}

if (!empty($localizacao)) {
    $sql .= " AND localizacao = '$localizacao'";
}

$result = $conn->query($sql);
$vagas = [];

while ($row = $result->fetch_assoc()) {
    $vagas[] = $row;
}

echo json_encode($vagas, JSON_UNESCAPED_UNICODE);
?>