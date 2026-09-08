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
    <title> Weller Bros | Alterar Filmes </title>
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
    <h1 class="text-center p-5 m-0" style="color:#06202B; background-color: #7AE2CF"> Vamos Atualizar...</h1>
    
    <form action="../Queries/sql_alterar_filmes.php" method="POST">
        <div class="d-flex flex-column w-100 justify-content-center align-items-center">
            <div class="d-flex flex-column p-5 w-25 gap-2" style="background-color:#06202B;">
                <h1 style="color:#7AE2CF" class="text-center"> Alterar Filme</h1>
                
                <select id="select-filme" class="fs-4 mb-3" style="border: 2px solid #7AE2CF;" required>
                    <option value="" selected disabled> Selecione o filme para alterar </option>
                    <?php foreach ($filmes as $f): ?>
                        <option value="<?= $f['ID'] ?>" 
                                data-titulo="<?= htmlspecialchars($f['Titulo']) ?>"
                                data-avaliacao="<?= $f['Avaliacao'] ?>"
                                data-duracao="<?= $f['Duracao_Minutos'] ?>"
                                data-genero="<?= $f['IDGenero'] ?>"
                                data-produtora="<?= $f['IDProdutora'] ?>"
                                data-bilheteria="<?= $f['Bilheteria'] ?>"
                                data-sinopse="<?= htmlspecialchars($f['Sinopse']) ?>"
                                data-atores="<?= htmlspecialchars($f['AtoresPrincipais']) ?>"
                                data-pais="<?= htmlspecialchars($f['Pais']) ?>"
                                data-premiacoes="<?= htmlspecialchars($f['Premios']) ?>">
                            <?= htmlspecialchars($f['Titulo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="hidden" name="id" id="input-id">
                
                <input type="text" name="titulo" id="input-titulo" class="fs-4 ps-2 form-control" placeholder="Título (obrigatório)">
                <input type="number" step="0.1" name="avaliacao" id="input-avaliacao" class="fs-4 ps-2 form-control" placeholder="Avaliação (opcional)">
                <input type="number" name="duracao" id="input-duracao" class="fs-4 ps-2 form-control" placeholder="Duração (Minutos) (obrigatório)">
                
                <select name="id_genero" id="select-genero" class="fs-4">
                    <option value=""> Escolha um gênero (obrigatório) </option>
                    <?php getOpcoesGenero($con) ?>
                </select>
                <select name="id_produtora" id="select-produtora" class="fs-4">
                    <option value=""> Escolha uma produtora (obrigatório) </option>
                    <?php getOpcoesProdutora($con) ?>
                </select>

                <input type="number" name="bilheteria" id="input-bilheteria" class="fs-4 ps-2 form-control" placeholder="Bilheteria (R$) (opcional)">
                <input type="text" name="sinopse" id="input-sinopse" class="fs-4 ps-2 form-control" placeholder="Sinopse (opcional)">
                <input type="text" name="atores_principais" id="input-atores" class="fs-4 ps-2 form-control" placeholder="Atores Principais (opcional)">
                <input type="text" name="pais" id="input-pais" class="fs-4 ps-2 form-control" placeholder="País (opcional)">
                <input type="text" name="premiacoes" id="input-premiacoes" class="fs-4 ps-2 form-control" placeholder="Premiações (opcional)">

                <button class="btn btn-secondary fs-4 py-2 mt-2" id="btn-confirmar"> Confirmar Alteração </button>
            </div>
        </div>
    </form>
    
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('select-filme').addEventListener('change', function() {
            const opcaoSelecionada = this.options[this.selectedIndex];
            
            document.getElementById('input-id').value = this.value;
            document.getElementById('input-titulo').value = opcaoSelecionada.getAttribute('data-titulo') || '';
            document.getElementById('input-avaliacao').value = opcaoSelecionada.getAttribute('data-avaliacao') || '';
            document.getElementById('input-duracao').value = opcaoSelecionada.getAttribute('data-duracao') || '';
            document.getElementById('select-genero').value = opcaoSelecionada.getAttribute('data-genero') || '';
            document.getElementById('select-produtora').value = opcaoSelecionada.getAttribute('data-produtora') || '';
            document.getElementById('input-bilheteria').value = opcaoSelecionada.getAttribute('data-bilheteria') || '';
            document.getElementById('input-sinopse').value = opcaoSelecionada.getAttribute('data-sinopse') || '';
            document.getElementById('input-atores').value = opcaoSelecionada.getAttribute('data-atores') || '';
            document.getElementById('input-pais').value = opcaoSelecionada.getAttribute('data-pais') || '';
            document.getElementById('input-premiacoes').value = opcaoSelecionada.getAttribute('data-premiacoes') || '';
        });
    </script>
</body>

</html>
