<?php
    include_once "../config/conexao.php";

    try {
        $sql = "INSERT INTO listaprodutos (idUser, idProduto) VALUES (:idUser, :idProduto)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":idUser", $_POST['idUser']);
        $statement->bindParam(":idProduto", $_POST['idProduto']);
        $statement->execute();
    } catch(Exception $ex) {
        echo "ERRO: " . $ex->getMessage();
    }
    
?>