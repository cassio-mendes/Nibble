<?php
    include_once "../config/conexao.php";

    //Obtendo os id's e preços dos produtos no carrinho
    $sql = "SELECT produto.idProduto, preco FROM produto JOIN listaprodutos lp ON produto.idProduto = lp.idProduto
    JOIN usuario u ON lp.idUser = u.idUser WHERE u.idUser = :idUser;";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(":idUser", $_POST['idUser']);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    //Calculando o valor total a ser pago
    $valor = 0.0;
    foreach($result as $produto) {
        $valor += $produto['preco'];
    }

    $dataCompra = new DateTime(); //Definindo a data da compra
    
    //Gerando token único e aleatório para representar o pedido
    $token = "";

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

    //Realizando a inserção do pedido no banco
    $sql3 = "INSERT INTO pedido (idUser, valor, dataCompra, status, token) VALUES (:idUser, :valor, :dataCompra, :status, :token);";
    $statement = $pdo->prepare($sql3);
    $statement->bindParam(":idUser", $_POST['idUser']);
    $statement->bindParam(":valor", $valor);
    $statement->bindParam(":dataCompra", $dataCompra);
    $statement->bindParam(":status", false); //Falso pq ainda não houve pagamento
    $statement->bindParam(":token", $token);
    $statement->execute();
    
    //Obtendo o índice do pedido
    $sql4 = "SELECT idPedido FROM pedido WHERE token = :token;";
    $statement = $pdo->prepare($sql4);
    $statement->bindParam(":token", $token);
    $statement->execute();
    $idPedido = $statement->fetch(PDO::FETCH_ASSOC);

    //Realizando a inserção dos produtos comprados no pedido
    $sql5 = "INSERT INTO produtospedido (idPedido, idProduto) VALUES (:idPedido, :idProduto);";
    
    foreach($result as $produto) {
        $statement = $pdo->prepare($sql5);
        $statement->bindParam(":idPedido", $idPedido);
        $statement->bindParam(":idProduto", $produto['idProduto']);
    }
?>