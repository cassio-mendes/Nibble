<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/senhaRecuperada.css">
    <title>Nibble</title>
</head>

<body>
    <div class="reset-password-container">
        <h1>Redefinir Senha</h1>
        <p>Digite sua nova senha abaixo.</p>
        <form id="newPasswordForm" action="salvarNovaSenha.php" method="post">
        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">

            <div class="input-group">
                <label for="novaSenha">Nova Senha</label>
                <input type="password" id="novaSenha" name="novaSenha" placeholder="Digite a nova senha" required>
            </div>
            <br>
            <div class="input-group">
                <label for="confirmarSenha">Confirmar Nova Senha</label>
                <input type="password" id="confirmarSenha" name="confirmarSenha" placeholder="Confirme a nova senha"
                    required>
            </div>
            <br>
            <button type="submit" class="btn">Salvar</button>
        </form>

        <br><br>
        <div class="botao">
            <a href="login.php">
                <button class="btn">Voltar ao Login</button>
            </a>
        </div>
    </div>
</body>

</html>