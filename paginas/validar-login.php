<?php
    include_once "conexao.php";
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $sql = "SELECT email, senha, admin FROM usuario where email = '$email' and senha = '$senha'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) > 0) {
        if($result["admin"] === 1){
            header("mainPageADM.html");
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