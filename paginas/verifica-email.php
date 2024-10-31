<?php
    include_once "conexao.php";

    $email = $_POST['email'];

    $sql = "SELECT email FROM usuario WHERE email = '$email';";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();

    if(count($result) > 0) { //O Usuário está logado
         
    } else {

    }
?>