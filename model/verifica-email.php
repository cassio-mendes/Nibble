<?php
    include_once "conexao.php";
    try {
        $email = $_POST['email'];

        $sql = "SELECT email FROM usuario WHERE email = :email;";
        echo $sql;
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        ?>
            <script>console.log("executou a query")</script>
        <?php
        
        if($result) { //O Usuário possui um email no sistema
            ?>
                <script>console.log("Email existe")</script>
            <?php
            //header("Location: '../paginas/recuperarSenha.html'");
        } else {
            ?>
                <script>console.log("Email não existe")</script>
            <?php
            echo 'else';
            //header("Location: '../paginas/login.php'");
        }
    } catch(Error $erro) {
        echo "ERRO " . $erro->getMessage();
    }
?>