<?php 
$host = "localhost";
$user_name = "root";
$user_pass = "root";
$database = "Filmes";

$con = mysqli_connect($host, $user_name, $user_pass, $database);

if (!$con)
    die("Falha na conexão: ". mysqli_connect_error());

mysqli_set_charset($con, "utf8mb4");

?>