<?php 
    include_once "../config/conexao.php";

    $sql = "SELECT * FROM produto;";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
?>