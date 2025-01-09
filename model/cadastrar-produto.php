<?php 
    include_once "../config/conexao.php";
    
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $target_dir = "img/"; //Obtenha o link dessa imagem
    $target_file = $target_dir . basename($_FILES['img']['name']);
    
    echo "Diretório: " . $target_dir;
    
    try {
        if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                echo "O arquivo " . basename($_FILES['img']['name']) . " foi enviado com sucesso.";
            } else {
                echo "Erro ao mover o arquivo.";
            }
        } else {
            echo "Erro no upload do arquivo: " . $_FILES['img']['error'];
        }        
    } catch(Error $e) {
        echo "Deu erro no upload";
    }
    /*
    try {
        $sql = "INSERT INTO produto (nome, tipo, preco, descricao, imagem) VALUES (:nome, :tipo, :preco, :descricao, :imagem)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":nome", $nome);
        $statement->bindParam(":tipo", $tipo);
        $statement->bindParam(":preco", $preco);
        $statement->bindParam(":descricao", $descricao);
        $statement->bindParam(":imagem", $target_file);
        
        if ($statement->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar produto.";
        }
    } catch (PDOException $e) {
        echo "Erro ao inserir no banco de dados: " . $e->getMessage();
    }*/
    
?>