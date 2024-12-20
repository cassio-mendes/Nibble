<?php 
    include_once "../config/conexao.php";
    
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['img']; //Obtenha o link dessa imagem
    
    $target_dir = "img/" . basename($_FILES["img"]["name"]);
    echo "Diretório: " . $target_dir;
    
    try {
        if($_FILES['img']['error'] === UPLOAD_ERR_OK && is_writable($target_dir)) { //O arquivo chegou e o diretório pode ter novos arq.
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir)) { //
                echo "O arquivo ". basename( $_FILES["img"]["name"]). " foi enviado.";
            } else {
                echo "Erro ao mover o arquivo";
            }
        } else {
            echo "O arquivo não chegou ou não temos permissão para escrever no diretório \n";
            
            if($_FILES['img']['error'] === UPLOAD_ERR_OK) {echo "PRIMEIRO";}
            if(is_writable($target_dir)) {echo "SEGUNDO";}
        }
    } catch(Error $e) {
        echo "Deu erro no upload";
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