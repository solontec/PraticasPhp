<?php 

$host = "localhost";
$user = "root";
$pass = "";
$banco = "add_task";
$port = 3307;

$conn = new mysqli($host, $user, $pass, $banco, $port);

if($conn->connect_error){
    echo "não foi possivel conectar" . $conn->error;
}

echo "pronto";




?>


