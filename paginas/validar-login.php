<?php
    include_once "conexao.php";
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $sql = "SELECT email, senha, adm FROM usuario where email = '$email' and senha = '$senha'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) > 0) {
        if($result["adm"] === 1){
            header("mainPageADM.html");
            echo "foi";
        } else { //Não é um adm
            header("mainPage.html");
        }           
    } else {
        ?>
        <script>
        alert("Email ou senha incorretos :(")
        </script>
        <?php
    }
?>