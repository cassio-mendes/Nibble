<?php 
    include_once "../config/conexao.php";

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['img']; //Obtenha o link dessa imagem
    
    $target_dir = "img/";
    $target_dir = $target_dir . basename( $_FILES["imagem"]["name"]);
    
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_dir)) {
        echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    /*try {
        //Tentando fazer o upload pro banco
        $sql = "INSERT INTO produto (nome, tipo, preco, descricao, imagem) VALUES (:nome, :tipo, :preco, :descricao, :imagem);";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":nome", $nome);
        $statement->bindParam(":tipo", $tipo);
        $statement->bindParam(":preco", $preco);
        $statement->bindParam(":descricao", $descricao);
        $statement->bindParam(":imagem", $imagem);
    } catch (Error $e) {
        echo "ERRO " . $e->getMessage();
    }*/
?>