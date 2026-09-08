<?php
include_once("../Settings/DatabaseConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'] ?? '';

    if (empty($id)) {
        die("Erro: ID do filme é obrigatório para realizar a exclusão.");
    }

    $sql = "DELETE FROM filmes WHERE ID = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Filme excluído com sucesso!'); window.location.href='../Pages/index.html';</script>";
        } else {
            echo "Erro ao excluir o filme: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($con);
    }
}
?>