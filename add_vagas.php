<?php
include 'conexao.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $empresa = $_POST['empresa'];
    $localizacao = $_POST['localizacao'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $requisitos = $_POST['requisitos'];
    $tags = $_POST['tags'];

    $sql = "INSERT INTO vagas (titulo, empresa, localizacao, tipo, descricao, requisitos, tags) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("sssssss", $titulo, $empresa, $localizacao, $tipo, $descricao, $requisitos, $tags);

    if ($stmt->execute()) {
        $nova_vaga_id = $stmt->insert_id;
        header("Location: index.php?id=" . $nova_vaga_id . "&status=sucesso");
        exit;

    } else {
        echo "Erro ao adicionar vaga: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
} else {
    header("Location: vagas.php");
    exit;
}
?>
