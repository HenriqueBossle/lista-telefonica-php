<?php

include_once "db.php";

$id = $_GET["id"];
$sql = "DELETE FROM telefones WHERE id = $id";
if($conn->query($sql) === TRUE){
    header("Location: index.php");
    exit;
}else{
    echo "Erro: " . $conn->error;
}

?>