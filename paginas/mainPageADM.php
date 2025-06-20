<?php 
    session_start();
    if(!isset($_SESSION['adm']) || $_SESSION['adm'] === 0) {
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
    <title>Página Inicial</title>
    <link rel="stylesheet" href="../estilos/mainPage.css">
</head>

<body>
    <div class="mainPage-container">
        <img src="../img/hamb.png" alt="Logo do Site" id="logo">
        <script>
            let img = document.getElementById("logo")
            img.onload = function () {
                img.width = 255
                img.height = 255
            }
        </script>
        <h1>Bem-vindo <?php echo $_SESSION['nome'] ?>!</h1>
        <p>O que você gostaria de fazer agora?</p>
        <div class="botao-container">
            <a href="cardapio.php" class="btn">Alterar Cardápio</a>
            <a href="gerirPedidos.php" class="btn">Pedidos realizados</a>
            <a href="pratoDoDiaADM.php" class="btn">Atualizar prato do Dia</a>
            <a href="perfilCliente.php" class="btn">Perfil</a>
            <form action="../controller/logout.php">
                <button type="submit" class="btn">Sair</button>
            </form>
        </div>
    </div>
</body>
