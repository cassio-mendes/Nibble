<?php
    include_once "conexao.php";
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $sql = "SELECT * FROM usuario where email = '$email' and senha = '$senha'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    if(count($result) > 0) { //Se há pelo menos um resultado, o login tá certo
        session_start();
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['senha'] = $result['senha'];
        $_SESSION['telefone'] = $result['telefone'];
        $_SESSION['adm'] = $result['adm'];

        if($_SESSION['adm'] === 1){ //É um adm
            header("Location: /nibble/paginas/mainPageADM.php");
        } else { //Não é um adm
            header("Location: /nibble/paginas/mainPage.php");
        }           
    } else {
        ?>
        <script>
        alert("Email ou senha incorretos :(") //Erro de login
        </script>
        <?php
    }
?>