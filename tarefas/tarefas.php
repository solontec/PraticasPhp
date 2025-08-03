<?php 
require_once "connect.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'] ?? '';
    $sobre = $_POST['sobre'] ?? '';

    $sql = "INSERT INTO tarefas(nome, sobre) VALUES(?, ?)";

    $stmt = $conn->prepare($sql);

    if(!$stmt){
        die("erro na preparação") .  $conn->error;
    }

    $stmt->bind_param("ss", $nome, $sobre);
    $stmt->execute();
    echo "sucesso";


}

$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="tarefas">
        <form action="tarefas.php" method="POST"> <!-- se n colocar o metodo post ele n vai enviar pra nenhum lugar ne animal -->
            <label>Digite o nome da tarefa</label>
            <input type="text" name="nome"> 

            <label>Insira sobre a tarefa</label>
            <input type="text" name="sobre">;

            <button type="submit">adicionar</button>
        </form>


    </div>
</body>
</html>