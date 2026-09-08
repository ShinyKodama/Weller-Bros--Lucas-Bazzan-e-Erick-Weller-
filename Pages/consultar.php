<?php
include_once("../Settings/DatabaseConnection.php");

$pesquisa = $_GET['pesquisa'] ?? '';

if (!empty($pesquisa)) {
    $sql_filmes = "SELECT f.*, g.Genero, p.Produtora 
                   FROM filmes f
                   LEFT JOIN Generos g ON f.IDGenero = g.ID
                   LEFT JOIN Produtora p ON f.IDProdutora = p.ID
                   WHERE f.Titulo LIKE ? 
                   ORDER BY f.Titulo";
    $stmt = mysqli_prepare($con, $sql_filmes);
    $param = "%" . $pesquisa . "%";
    mysqli_stmt_bind_param($stmt, "s", $param);
    mysqli_stmt_execute($stmt);
    $res_filmes = mysqli_stmt_get_result($stmt);
} else {
    $sql_filmes = "SELECT f.*, g.Genero, p.Produtora 
                   FROM filmes f
                   LEFT JOIN Generos g ON f.IDGenero = g.ID
                   LEFT JOIN Produtora p ON f.IDProdutora = p.ID
                   ORDER BY f.Titulo";
    $res_filmes = mysqli_query($con, $sql_filmes);
}

$filmes = [];
if ($res_filmes) {
    while ($linha = mysqli_fetch_assoc($res_filmes)) {
        $filmes[] = $linha;
    }
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    } else {
        mysqli_free_result($res_filmes);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/style.css">
    <title> Weller Bros | Consultar Catálogo </title>
</head>
<style>
    body    { background-color: #FDEB9E; }
    .titulo { color: #FDEB9E !important; }
    .card-filme {
        background-color: #06202B;
        border: 2px solid #7AE2CF;
        color: white;
        transition: transform 0.3s ease;
    }
    .card-filme:hover { transform: translateY(-5px); }
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
    
    <h1 class="text-center p-5 m-0" style="color:#06202B; background-color: #7AE2CF"> Catálogo de Filmes </h1>

    <div class="container my-5">
        <form action="consultar.php" method="GET" class="mb-5 mx-auto" style="max-width: 500px;">
            <div class="input-group shadow-sm">
                <input type="text" name="pesquisa" class="form-control fs-4 ps-3" placeholder="Buscar filme por título..." value="<?= htmlspecialchars($pesquisa) ?>">
                <button class="btn btn-secondary fs-4 px-4" type="submit">Buscar</button>
            </div>
        </form>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if (empty($filmes)): ?>
                <div class="col-12 text-center my-5">
                    <h3 style="color: #06202B;">Nenhum filme encontrado no catálogo.</h3>
                </div>
            <?php else: ?>
                <?php foreach ($filmes as $f): ?>
                    <div class="col">
                        <div class="card h-100 card-filme p-4 rounded-4 shadow">
                            <div class="card-body d-flex flex-column p-0">
                                <h2 class="card-title mb-3 fw-bold text-center" style="color: #7AE2CF;"><?= htmlspecialchars($f['Titulo']) ?></h2>
                                
                                <p class="card-text fs-5 mb-2"><strong>Gênero:</strong> <?= htmlspecialchars($f['Genero'] ?? 'Não informado') ?></p>
                                <p class="card-text fs-5 mb-2"><strong>Produtora:</strong> <?= htmlspecialchars($f['Produtora'] ?? 'Não informado') ?></p>
                                <p class="card-text fs-5 mb-2"><strong>Duração:</strong> <?= $f['Duracao_Minutos'] ?> min</p>
                                <p class="card-text fs-5 mb-2"><strong>Avaliação:</strong> <?= $f['Avaliacao'] ? $f['Avaliacao'] . ' / 10' : 'Sem nota' ?></p>
                                <p class="card-text fs-5 mb-2"><strong>País:</strong> <?= htmlspecialchars($f['Pais'] ?? 'Não informado') ?></p>
                                <p class="card-text fs-5 mb-3"><strong>Bilheteria:</strong> <?= $f['Bilheteria'] ? 'R$ ' . number_format($f['Bilheteria'], 2, ',', '.') : 'Não informada' ?></p>
                                
                                <div class="mt-auto pt-3 border-top border-secondary">
                                    <p class="card-text fs-6 mb-2"><strong>Atores:</strong> <small class="text-white-50"><?= htmlspecialchars($f['AtoresPrincipais'] ?? 'Não informados') ?></small></p>
                                    <p class="card-text fs-6 mb-2"><strong>Premiações:</strong> <small class="text-white-50"><?= htmlspecialchars($f['Premios'] ?? 'Nenhuma') ?></small></p>
                                    <p class="card-text fs-6 mb-0"><strong>Sinopse:</strong> <small class="text-white-50 d-block text-truncate-3"><?= htmlspecialchars($f['Sinopse'] ?? 'Sem sinopse.') ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>