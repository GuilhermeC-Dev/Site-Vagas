<?php
include 'conexao.php';

$titulo = $_POST['titulo'];
$empresa = $_POST['empresa'];
$localizacao = $_POST['localizacao'];
$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO vagas (titulo, empresa, localizacao, tipo, descricao) 
        VALUES ('$titulo', '$empresa', '$localizacao', '$tipo', '$descricao')";

if ($conn->query($sql) === TRUE) {
    echo "Vaga adicionada com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>