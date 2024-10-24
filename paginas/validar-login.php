<?php
    include_once "conexao.php";
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $sql = "SELECT email, senha, adm FROM usuario where email = '$email' and senha = '$senha'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    echo "adm:" . $result["adm"] . "\n";
    echo "email:" . $result["email"] . "\n";
    echo "senha:" . $result["senha"] . "\n";

    if(count($result) > 0) { //Se há pelo menos um resultado
        if($result["adm"] === 1){ //É um adm
            //header("Location: nibble/mainPageADM.html");
        } else { //Não é um adm
            //header("Location: /nibble/paginas/mainPage.html");
        }           
    } else {
        ?>
        <script>
        alert("Email ou senha incorretos :(") //Erro de login
        </script>
        <?php
    }
?>