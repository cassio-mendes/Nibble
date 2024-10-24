<?php 
    include_once "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO usuario (nome, email, senha, telefone, adm) VALUES ('$nome', '$email', '$senha', $telefone, false);";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    header("Location: /nibble/paginas/login.php");
?>