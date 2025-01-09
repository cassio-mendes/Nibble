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
    <section id="lista-carrinho">
        <img src="../img/hamb.png" alt="Logo do Site" id = "logo">
        <script>
            let img = document.getElementById("logo")

            img.onload = function() {
                img.width = 200
                img.height = 200
            }
        </script>
    <div class="botoes">
        <button class="btn-finalizar-compra">Finalizar Compra</button>
        <button class="btn-continuar-comprando">Continuar Comprando</button>
        <button class="btn-cancelar-compra">Cancelar Compra</button>
    </div>
</section>
</body>

</html>
