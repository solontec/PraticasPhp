<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "tb_login";
$port = 3307;

$conn = new mysqli($host, $user, $pass, $banco, $port);

if($conn->connect_error){
    die("Erro na conexao");
} 


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT); //VARIAVEL JÁ DECLARADA COM HASH PARA CRIPTOGRAFAR A SENHA DIGITADA

$sql = "INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)";  // sempre passar como paramtro e n variavel
$stmt = $conn->prepare($sql); // aqui ele prepara o banco  e envia a estrutura da consulta para o sql com os ???

if($stmt){
    die("erro no prepare");
    $conn->error;
} 
    // se preparar corretamente
    $stmt->bind_param("sss", $nome, $email, $senha); // envia os parametros certos batendo ??? com nome email e senha
    $stmt->execute();
    echo "cadastro realizado com sucesso";
    
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
    
    <form action="cadastro.php" method="POST"> <!-- o action"cadastrar.php" é o arquivo que vai receber e processar os dados -->
        <label>Nome:</label>  <!-- metodo post para enviar os dados de forma mais segura, sem ser pela URL -->
        <input type="text" name="nome" required> <br><br>

        <label>Email:</label>
        <input type="email" name="email" required> <br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required> <br><br>

        
        <button type="submit"> Cadastrar</button>
    </form>
</body>
</html>