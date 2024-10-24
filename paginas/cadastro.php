<!DOCTYPE html>
<html>

<head>
    <title>Nibble</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/cadastro.css">
</head>

<body>
    <div class="cadastro-container">
        <img src="../img/hamb.png" alt="Logo do Site" id="logo">
        <script>
            let img = document.getElementById("logo")

            img.onload = function () {
                img.width = 255
                img.height = 255
            }
        </script>

        <h1>Cadastro</h1>
        <form action="validar-cadastro.php" method="post">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div class="input-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            
            <button type="submit" class="cadastro-btn">Cadastrar</button>
        </form>
        
        <a href="login.html" class="link">Entrar</a>
        <a href="../index.html" class="link">Voltar ao Inicio</a>
    </div>
</body>

</html>