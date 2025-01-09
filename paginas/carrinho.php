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
    <link rel="stylesheet" href="../estilos/carrinho.css">
    <title>Carrinho</title>
</head>

<body>
    <header>
        <h1>Seu Carrinho</h1>
    </header>
    <section></section>
    <div class="botoes">
        <button class="finalizar-compra">Finalizar Compra</button>
        <button class="continuar-comprando">Continuar Comprando</button>
        <button class="cancelar-compra">Cancelar Compra</button>
    </div>
</body>

</html>
