<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

     $nome = $_POST['nome'];
     echo "$nome";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="nome">
        <button type="submit">consultar</button>

    </form>
    <h1></h1>
</body>
</html>