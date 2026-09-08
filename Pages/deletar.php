<?php
include_once("../Settings/DatabaseConnection.php");

$filmes = [];
$sql_filmes = "SELECT * FROM filmes ORDER BY Titulo";
$res_filmes = mysqli_query($con, $sql_filmes);
if ($res_filmes) {
    while ($linha = mysqli_fetch_assoc($res_filmes)) {
        $filmes[] = $linha;
    }
    mysqli_free_result($res_filmes);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/style.css">
    <title> Weller Bros | Excluir Filmes </title>
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
    <h1 class="text-center p-5 m-0" style="color:#06202B; background-color: #7AE2CF"> Área de Remoção...</h1>
    
    <form action="../Queries/sql_deletar_filmes.php" method="POST" onsubmit="return confirm('Tem certeza absoluta que deseja excluir este filme? Esta ação não pode ser desfeita.');">
        <div class="d-flex flex-column w-100 justify-content-center align-items-center">
            <div class="d-flex flex-column p-5 w-25 gap-2" style="background-color:#06202B;">
                <h1 style="color:#7AE2CF" class="text-center"> Excluir Filme</h1>
                
                <select name="id" class="fs-4 mb-3" style="border: 2px solid #7AE2CF;" required>
                    <option value="" selected disabled> Selecione o filme para remover </option>
                    <?php foreach ($filmes as $f): ?>
                        <option value="<?= $f['ID'] ?>">
                            <?= htmlspecialchars($f['Titulo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button class="btn btn-secondary fs-4 py-2 mt-2" id="btn-confirmar" style="background-color: #dc3545 !important; color: white;"> Confirmar Exclusão </button>
            </div>
        </div>
    </form>
    
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>