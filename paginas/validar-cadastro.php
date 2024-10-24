<?php 
    include_once "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO usuario (nome, email, senha, telefone) VALUES ('$nome', '$email', '$senha', $telefone);";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    
    
?>