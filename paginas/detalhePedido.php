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
    <title>Informações do pedido</title>
    <link rel="stylesheet" href="../estilos/detalhePedido.css">
</head>
<body>
    <div class="detalheCompra-container">
        <h1>Leia as informações do pedido</h1>
        <label for="text">Pedido realizado por: ---</label> <br> <br>
        <label for="text">Pedido realizado às: ---</label> <br> <br>
        <!--AQUI VEM O CÓDIGO PHP PRO CONTEÚDO-->
        <label for="text">Valor do pedido: R$00,00</label> <br><br>
        <label for="text">Status do pedido: --- </label> <br><br>
        <a href="gerirPedidos.php">
        <button class="detalheCompra-btn">Voltar</button>
    </a> 
    </div>
</body>

</html> 
