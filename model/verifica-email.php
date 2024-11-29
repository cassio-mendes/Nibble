<?php
    include_once "../config/conexao.php";
    try {
        $email = $_POST['email'];

        $sql = "SELECT email FROM usuario WHERE email = :email;";
        echo $sql;
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        
        if($result) { //O Usuário possui um email no sistema
            
        } else {
            header("Location: /nibble/paginas/login.php");
        }
    } catch(Error $erro) {
        echo "ERRO " . $erro->getMessage();
    }
?>