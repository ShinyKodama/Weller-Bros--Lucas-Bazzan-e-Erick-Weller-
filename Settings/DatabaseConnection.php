<?php 
$host = "localhost";
$user_name = "root";
$user_pass = "1234";
$database = "Filmes";
$port = 3307;

$con = mysqli_connect($host, $user_name, $user_pass, $database, $port);

if (!$con)
    die("Falha na conexão: ". mysqli_connect_error());

mysqli_set_charset($con, "utf8");

?>