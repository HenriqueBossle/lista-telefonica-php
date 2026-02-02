<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['HOST'];
$user = $_ENV['USER'];
$pass = $_ENV['PASS'];
$dbname = $_ENV['DBNAME'];

$conn = new mysqli($host, $user, $pass, $dbname);

/*if($conn->connect_error){
    echo "Falha na conexão" . $conn->connect_error;
}else{
    echo "Sucesso na conexão";
}*/

