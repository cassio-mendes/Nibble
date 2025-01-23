<?php
    include_once "../model/conexao.php";

    $sql = "INSERT INTO listaprodutos (idUser, idProduto) VALUES (:idUser, :idProduto)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":idUser", $_POST['idUser']);
    $statement->bindParam(":idProduto", $_POST['idProduto']);
    $statement->execute();
?>