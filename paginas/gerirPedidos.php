<?php 
    session_start();
    if(!isset($_SESSION['adm'])) {
        session_destroy();
        header("Location: /nibble/paginas/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../estilos/gerirPedidos.css">
</head>

<body>
    <div class="gerirPedidos-container">

        <h1>Pedidos recentes:</h1>
        <br>
        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes do Pedido </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes do Pedido </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes do pedido </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes do pedido </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes do pedido </button>
        </a>
        <br><br><br>   
        <label class="simple-text1" for="item">• Pedido feito por: --- </label> <label class="simple-text2"
            for="data">Data do pedido: --- </label>
        <br>
        <a href="detalhePedido.php">
            <button class="btn-info"> Mais detalhes do pedido </button>
        </a>
        <br><br><br><br>
        
        <a href="mainPageADM.php"> 
            <button class="btn-info">Voltar</button>
        </a>
        <br>

    </div>
    
</body>

</html>