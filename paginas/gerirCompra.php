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
    <title>Compras</title>
    <link rel="stylesheet" href="../estilos/gerirCompra.css">
</head>

<body>
    <div class="gerirCompra-container">

        <h1>Compras recentes:</h1>
        <br>
        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>
        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <label class="simple-text1" for="item">• Compra: --- </label> <label class="simple-text2" for="data">Data da compra: --- </label>
        <br>
        <a href="qr-code-final.php" >
            <button class="btn-info"> Mais detalhes da compra </button>
        </a>
        <br><br><br>

        <a href="mainPage.php">
            <button class="btn-info">Voltar</button>
        </a>
    </div>
</body>

</html>