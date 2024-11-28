<?php
    include_once "conexao.php";

    $email = $_POST['email'];

    $sql = "SELECT email FROM usuario WHERE email = '$email';";
    echo $sql;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    
    if(count($result) > 0) { //O Usuário possui um email no sistema
        echo "Email existe";
        //header("Location: '../paginas/recuperarSenha.html'");
    } else {
        ?>
            <script>alert('Este email não está cadastrado')</script>
        <?php
        header("Location: '../paginas/login.php'");
    }
?>