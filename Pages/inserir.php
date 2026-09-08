<?php
include_once("../Settings/DatabaseConnection.php");

function getOpcoesGenero($con)
{
    $generos = [];

    $sql_generos = "SELECT * FROM Generos ORDER BY Genero";
    $res_generos = mysqli_query($con, $sql_generos);

    if ($res_generos) {
        while ($linha = mysqli_fetch_assoc($res_generos)) {
            $generos[] = $linha;
        }

        mysqli_free_result($res_generos);
    }

    foreach ($generos as $g)
        echo '<option value="' . $g['ID'] . '">' . $g['Genero'] . '</option>';
}

function getOpcoesProdutora($con)
{
    $produtora = [];

    $sql_produtora = "SELECT * FROM Produtora ORDER BY Produtora";
    $res_produtora = mysqli_query($con, $sql_produtora);

    if ($res_produtora) {
        while ($linha = mysqli_fetch_assoc($res_produtora)) {
            $produtora[] = $linha;
        }

        mysqli_free_result($res_produtora);
    }

    foreach ($produtora as $p)
        echo '<option value="' . $p['ID'] . '">' . $p['Produtora'] . '</option>';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/style.css">
    <title> Weller Bros | Inserir Filmes </title>
</head>
<style>
    body { background-color: #FDEB9E; }
    .titulo { color: #FDEB9E !important; }
</style>

<body>
    <div class="navbar navbar-expand-lg shadow">
        <div class="container-fluid justify-content-between">
            <h1 class="titulo">~ Weller Bros ~</h1>
            <button class="navbar-toggler border-white border-1" type="button" data-bs-toggle="collapse"
                data-bs-target="#conteudoNavbar" aria-controls="conteudoNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fs-5" href="index.html"> >>> Voltar </a></li>
                </ul>
            </div>
        </div>
    </div>
    <h1 class="text-center p-5 m-0" style="color:#06202B; background-color: #7AE2CF"> Vamos Começar...</h1>
    <form action="sql_inserir_filmes.php" method="POST">
        <div class="d-flex flex-column w-100 justify-content-center align-items-center">
            <div class="d-flex flex-column p-5 w-25 gap-2" style="background-color:#06202B;">
                <h1 style="color:#7AE2CF" class="text-center"> Inserir Filme</h1>
                
                <input type="text" name="titulo" class="fs-4 ps-2 form-control" placeholder="Título (obrigatório)">
                <input type="number" name="avaliacao" class="fs-4 ps-2 form-control" placeholder="Avaliação (opcional)">
                <input type="number" name="duracao" class="fs-4 ps-2 form-control" placeholder="Duração (Minutos) (opcional)">
                
                <select name="id_genero" class="fs-4">
                    <option value="" selected> Escolha um gênero (obrigatório) </option>
                    <?php getOpcoesGenero($con) ?>
                </select>
                <select name="id_produtora" class="fs-4">
                    <option value="" selected> Escolha uma produtora (obrigatório) </option>
                    <?php getOpcoesProdutora($con) ?>
                </select>

                <input type="number" name="bilheteria" class="fs-4 ps-2 form-control" placeholder="Bilheteria (R$) (opcional)">
                <input type="text" name="sinopse" class="fs-4 ps-2 form-control" placeholder="Sinopse (opcional)">
                <input type="text" name="atores_principais" class="fs-4 ps-2 form-control" placeholder="Atores Principais (opcional)">
                <input type="text" name="pais" class="fs-4 ps-2 form-control" placeholder="País (opcional)">
                <input type="text" name="premiacoes" class="fs-4 ps-2 form-control" placeholder="Premiações (opcional)">

                <button class="btn btn-secondary fs-4 py-2 mt-2" id="btn-confirmar"> Confirmar </button>
            </div>
        </div>
    </form>
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>