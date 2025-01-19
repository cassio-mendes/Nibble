<?php 
    include_once "../config/conexao.php";

    function listarProdutos() {
        $sql = "SELECT * FROM produto;";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
?>