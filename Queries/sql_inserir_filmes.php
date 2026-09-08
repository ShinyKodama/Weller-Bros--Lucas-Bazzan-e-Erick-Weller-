<?php
include_once("../Settings/DatabaseConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $titulo = $_POST['titulo'] ?? '';
    $id_genero = $_POST['id_genero'] ?? '';
    $id_produtora = $_POST['id_produtora'] ?? '';
    $duracao_minutos = $_POST['duracao'] ?? '';

    if (empty($titulo) || empty($id_genero) || empty($id_produtora) || empty($duracao_minutos)) {
        die("Erro: Campos obrigatórios (Título, Gênero, Produtora e Duração) não foram preenchidos.");
    }

    $ano_lancamento = !empty($_POST['ano_lancamento']) ? $_POST['ano_lancamento'] : null;
    $bilheteria = !empty($_POST['bilheteria']) ? $_POST['bilheteria'] : null;
    $atores_principais = !empty($_POST['atores_principais']) ? $_POST['atores_principais'] : null;
    $avaliacao = !empty($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
    $pais = !empty($_POST['pais']) ? $_POST['pais'] : null;
    $classificacao = !empty($_POST['classificacao']) ? $_POST['classificacao'] : null;
    $sinopse = !empty($_POST['sinopse']) ? $_POST['sinopse'] : null;
    $diretor = !empty($_POST['diretor']) ? $_POST['diretor'] : null;
    $premios = !empty($_POST['premiacoes']) ? $_POST['premiacoes'] : null;

    $sql = "INSERT INTO filmes (AnoLancamento, IDGenero, Bilheteria, AtoresPrincipais, Titulo, Duracao_Minutos, Avaliacao, Pais, Classificacao, Sinopse, IDProdutora, Diretor, Premios) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "iidssisssssis", 
            $ano_lancamento, 
            $id_genero, 
            $bilheteria, 
            $atores_principais, 
            $titulo, 
            $duracao_minutos, 
            $avaliacao, 
            $pais, 
            $classificacao, 
            $sinopse, 
            $id_produtora, 
            $diretor, 
            $premios
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Filme inserido com sucesso!'); window.location.href='index.php';</script>";
        } else {
            echo "Erro ao inserir filme: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($con);
    }
}
?>