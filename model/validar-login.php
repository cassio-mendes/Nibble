<?php
    include_once "../config/conexao.php";
    
    try {
        $email = $_POST["email"];
        $senha = $_POST["senha"]; //A senha só é criptografada no cadastro
        echo('Email: ' . $email);

        $sql = "SELECT * FROM usuario WHERE email = :email;";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if(!$result) {
            echo('A sql não funcionou');
            echo($result['senha']);
        }

        if(count($result) > 0 && password_verify($senha, $result['senha'])) { //Se há pelo menos um resultado e a senha é correta
            session_start();
            $_SESSION['nome'] = $result['nome'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['telefone'] = $result['telefone'];
            $_SESSION['adm'] = $result['adm'];

            if($_SESSION['adm'] === 1){ //É um adm
                header("Location: /nibble/paginas/mainPageADM.php");
            } else { //Não é um adm
                header("Location: /nibble/paginas/mainPage.php");
            }   
            
            exit(); //Finalizar a execução
        } else {
            ?>
            <script>
                alert("Email ou senha incorretos :(") //Erro de login
                history.back()
            </script>
            <?php
        }
    } catch(Exception $e) {
        echo('Exceção: ' . $e->getMessage());
    }
?>