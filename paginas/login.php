<?php
    session_start();

    if(isset($_SESSION['adm'])) {
        if($_SESSION['adm'] === 1) {
            header("Location: /nibble/paginas/mainPageADM.php");
            exit();
        } else {
            header("Location: /nibble/paginas/mainPage.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibble</title>
    <link rel="stylesheet" href="../estilos/login.css">
    
</head>

<body>
    <div class="login-container">
        <img src="../img/hamb.png" alt="Logo do Site" id="logo">
        <script>
            let img = document.getElementById("logo")

            img.onload = function () {
                img.width = 255
                img.height = 255
            }
        </script>

        <h1>Login</h1>
        <form action="../model/validar-login.php" method="post">
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button class="login-btn" type="submit">Entrar</button>
        </form>
        <a href="recuperarSenha.html" class="forgot-password">Esqueceu a senha?</a>
        <a href="cadastro.php" class="forgot-password">Cadastrar</a>
        <a href="../index.html" class="forgot-password">Voltar ao Inicio</a>
    </div>
</body>

</html>