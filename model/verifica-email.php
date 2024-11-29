<?php
    include_once "../config/conexao.php";
    try {
        $email = $_POST['email'];

        $sql = "SELECT email FROM usuario WHERE email = :email;";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        
        if($result) { //O Usuário possui um email no sistema
            ?>
                <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
                <script type="text/javascript">
                    //Inicia o EmailJS com o seu user ID
                    (function () {
                    emailjs.init("PLBOnk1RvPBlgwrzV"); //Chave pública
                    })();

                    //Parâmetros do serviço de envio de email
                    const templateParams = {
                        user_email: <?php $email ?>;
                        link_redefine: "https://feiratec.dev.br/nibble/paginas/senhaRecuperada.html?code=" + code,
                        from_name: 'Nibble'
                    };

                    <?php
                        //Obtendo o ID referente ao email enviado
                        $sqlSelect = "SELECT idUser FROM usuario WHERE email = '" . $email . "'";
                        $statement = $pdo->prepare($sqlSelect);
                        $statement->execute();
                        $result = $statement->fetch();

                        //Criação do código aleatório
                        $code = random_int(10000000000, 99999999999);

                        //Inserindo o código para recuperação de senha no banco
                        $sqlInsert = "INSERT INTO codigosRecuperacao (code, idUser) VALUES (:code, :idUser);";
                        $statement = $pdo->prepare($sqlInsert);
                        $statement->bindParam(":code", $code);
                        $statement->bindParam(":idUser", $result['idUser']);
                        $statement->execute();
                    ?>

                    //Configuração dos serviços 
                    emailjs.send('service_b9zkh8s', 'template_o38aeff', templateParams) //ID do serviço e ID do template
                        .then(function (response) {
                        alert('E-mail enviado com sucesso :)', response.status, response.text);
                        }, function (error) {
                        console.log(error);
                        alert('verifique sua conexão ou sua chave', error);
                    });
                </script>
            <?php
        } else {
            header("Location: /nibble/paginas/login.php");
        }
    } catch(Error $erro) {
        echo "ERRO " . $erro->getMessage();
    }
?>