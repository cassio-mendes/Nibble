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
        <div class="input-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button class="login-btn" onclick="enviar()">Entrar</button>
        <a href="#" class="forgot-password">Esqueceu a senha?</a>
        <a href="cadastro.html" class="forgot-password">Cadastrar</a>
        <a href="../index.html" class="forgot-password">Voltar ao Inicio</a>
    </div>
</body>


<script>

    function enviar () {
        let email = document.getElementById("email").value;
        let senha = document.getElementById("password").value;
        
        <?php
            include_once "conexao.php";

            $sql = "SELECT email, senha, admin FROM usuario;";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) > 0) {
                foreach ($result as $row) {
                    ?>
                    if(email === <?php echo $row["email"] ?> && senha === <?php echo $row["senha"] ?>) {
                        //LOGADO COM SUCESSO!!!
                        //Agora falta saber se é um cliente ou admin

                        if(<?php echo $row["admin"] ?> === 1) { //É um adm
                            location.href = "mainPageADM.html"
                        } else { //Não é um adm
                            location.href = "mainPage.html"
                        }
                        <?php return; ?>
                    }
                    <?php
                }
                ?>
                    alert("Email ou senha incorretos :(")
                <?php
            }
        ?>
    }
    
    /*var request;

    function enviar() {
        try {
            var senha = document.getElementById("password").value;
            var email = document.getElementById("email").value;

            request = new XMLHttpRequest();
            request.addEventListener("readystatechange", processaDadoServidor, false);
            request.open('GET', "http://4.228.227.52:8080/atividadelogin/autenticar?email=" + email + "&senha=" + senha, true)
            request.send(null)

        } catch (exception) {
            alert('problema no envio de dados');
        }
    }

    function processaDadoServidor() {
        if (request.status == 200 && request.readyState == 4) { //status == 200 -> Houve um response para o request
            //readyState == 4 -> O código está na etapa de ler a mensagem do response
            if (request.responseText === "true") { //Se o texto da mensagem for igual a "true"

                alert("Logado com sucesso!")

            } else if (request.responseText === "false") {//Se o texto da mensagem for igual a "false" 

                alert('Credenciais incorretas...')

            }
        }
    }*/
</script>

</html>