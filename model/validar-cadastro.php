<?php
include_once "../config/conexao.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); //Criptografando a senha
$telefone = $_POST["tel"];

$sql = "INSERT INTO usuario (nome, email, senha, telefone, adm) VALUES (:nome, :email, :senha, :telefone, false);";
$statement = $pdo->prepare($sql);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':email', $email);
$statement->bindParam(':senha', $senha);
$statement->bindParam(':telefone', $telefone);
$statement->execute();

header("Location: /nibble/paginas/login.php");

exit();
