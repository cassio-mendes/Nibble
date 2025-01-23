<?php
    include_once "../config/conexao.php";

    //Obtendo os id's e preços dos produtos no carrinho
    $result;
    try {
        $sql = "SELECT produto.idProduto, preco FROM produto JOIN listaprodutos lp ON produto.idProduto = lp.idProduto
        JOIN usuario u ON lp.idUser = u.idUser WHERE u.idUser = :idUser;";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":idUser", $_POST['idUser']);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        echo "Erro 1: " . $e->getMessage();
    }
    echo "ID: " . $_POST['idUser'];
    var_dump($result);

    //Calculando o valor total a ser pago
    $valor = 0.0;
    foreach($result as $produto) {
        $valor += $produto['preco'];
    }

    $dataCompra = new DateTime(); //Definindo a data da compra

    var_dump($valor);
    var_dump($dataCompra);
    
    //Gerando token único e aleatório para representar o pedido
    $token = "";

    try {
        $pronto = false;
        do {
            $token = "";

            for($i = 0; $i < 10; $i++) {
                $token .= random_int(0, 9);
            }

            $sql2 = "SELECT token FROM pedido WHERE token = :token;";
            $statement = $pdo->prepare($sql2);
            $statement->bindParam(":token", $token);
            $statement->execute();
            $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);

            if(!count($result2) > 0) {
                $pronto = true;
            }
        }while(!$pronto);
    } catch(Exception $e2) {
        echo "Erro 2: " . $e2->getMessage();
    }
    
    var_dump($token);

    //Realizando a inserção do pedido no banco
    try {
        $sql3 = "INSERT INTO pedido (idUser, valor, dataCompra, status, token) VALUES (:idUser, :valor, :dataCompra, :status, :token);";
        $statement = $pdo->prepare($sql3);
        $statement->bindParam(":idUser", $_POST['idUser']);
        $statement->bindParam(":valor", $valor);
        $statement->bindParam(":dataCompra", $dataCompra);
        $statement->bindParam(":status", false); //Falso pq ainda não houve pagamento
        $statement->bindParam(":token", $token);
        $statement->execute();
    } catch(Exception $e3) {
        echo "Erro 3: " . $e3->getMessage();
    }
    
    
    //Obtendo o índice do pedido
    $idPedido;
    try {
        $sql4 = "SELECT idPedido FROM pedido WHERE token = :token;";
        $statement = $pdo->prepare($sql4);
        $statement->bindParam(":token", $token);
        $statement->execute();
        $idPedido = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e4) {
        echo "Erro 4: " . $e4->getMessage();
    }

    var_dump($idPedido);

    //Realizando a inserção dos produtos comprados no pedido
    try {
        $sql5 = "INSERT INTO produtospedido (idPedido, idProduto) VALUES (:idPedido, :idProduto);";
    
        foreach($result as $produto) {
            $statement = $pdo->prepare($sql5);
            $statement->bindParam(":idPedido", $idPedido);
            $statement->bindParam(":idProduto", $produto['idProduto']);
            $statement->execute();
        }
    } catch(Exception $e5) {
        echo "Erro 5: " . $e5->getMessage();
    }
    

    header("Location: /nibble/paginas/qr-code-final.php");
?>