<?php
include_once("../Settings/DatabaseConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $id_genero = $_POST['id_genero'] ?? '';
    $id_produtora = $_POST['id_produtora'] ?? '';
    $duracao_minutos = $_POST['duracao'] ?? '';

    if (empty($id) || empty($titulo) || empty($id_genero) || empty($id_produtora) || empty($duracao_minutos)) {
        die("Erro: ID, Título, Gênero, Produtora e Duração são obrigatórios.");
    }

    $avaliacao = !empty($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
    $bilheteria = !empty($_POST['bilheteria']) ? $_POST['bilheteria'] : null;
    $sinopse = !empty($_POST['sinopse']) ? $_POST['sinopse'] : null;
    $atores_principais = !empty($_POST['atores_principais']) ? $_POST['atores_principais'] : null;
    $pais = !empty($_POST['pais']) ? $_POST['pais'] : null;
    $premios = !empty($_POST['premiacoes']) ? $_POST['premiacoes'] : null;

    $sql = "UPDATE filmes SET 
                Titulo = ?, 
                Avaliacao = ?, 
                Duracao_Minutos = ?, 
                IDGenero = ?, 
                IDProdutora = ?, 
                Bilheteria = ?, 
                Sinopse = ?, 
                AtoresPrincipais = ?, 
                Pais = ?, 
                Premios = ? 
            WHERE ID = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "sdiidsssssi", 
            $titulo, 
            $avaliacao, 
            $duracao_minutos, 
            $id_genero, 
            $id_produtora, 
            $bilheteria, 
            $sinopse, 
            $atores_principais, 
            $pais, 
            $premios, 
            $id
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Filme atualizado com sucesso!'); window.location.href='../Pages/index.html';</script>";
        } else {
            echo "Erro ao atualizar o filme: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($con);
    }
}
?>