<?php
    include_once "../config/conexao.php";

    $sql = "UPDATE produto SET nome = :nome, preco = :preco, descricao = :descricao WHERE idProduto = :idProduto;";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":nome", $_POST['nome']);
    $statement->bindParam(":preco", $_POST['preco']);
    $statement->bindParam(":descricao", $_POST['descricao']);
    $statement->bindParam(":idProduto", $_POST['idProduto']);
    $statement->execute();

    header("Location: /nibble/paginas/cardapio.php");
?>