<?php
    include_once "conexao.php";

    $email = $_POST['email'];

    $sql = "SELECT email FROM usuario WHERE email = '$email';";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();

    if(count($result) > 0) { //O Usuário está logado
        header("Location: /nibble/paginas/senhaRecuperada.html");
    } else {
        ?>
            <script>alert('Este email não está cadastrado')</script>
        <?php
        header("Location: '/nibble/paginas/login.php'");
    }
?>