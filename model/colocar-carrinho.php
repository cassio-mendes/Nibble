<?php
    include_once "../model/conexao.php";

    echo $_POST['idUser'] . "   ";
    echo $_POST['idProduto'];

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