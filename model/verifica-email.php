<?php
    include_once "../config/conexao.php";
    try {
        $email = $_POST['email'];

        $sqlEmail = "SELECT email FROM usuario WHERE email = :email;";
        $statementEmail = $pdo->prepare($sqlEmail);
        $statementEmail->bindParam(':email', $email);
        $statementEmail->execute();
        $resultEmail = $statementEmail->fetch();
        ?><script>console.log("Result email: " + <?php echo json_encode($resultEmail['email']); ?>)</script><?php
    } catch(Error $erro) {
        echo "ERRO " . $erro->getMessage();
    }

    if($resultEmail) { //O Usuário possui um email no sistema
            ?>
            <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
            <script type="text/javascript">
                //Inicia o EmailJS com o seu user ID
                (function () {
                    emailjs.init("PLBOnk1RvPBlgwrzV"); //Chave pública
                })();

                //Parâmetros do serviço de envio de email
                const templateParams = {
                    user_email: <?php $email ?>,
                    link_redefine: "https://feiratec.dev.br/nibble/paginas/senhaRecuperada.html?code=" + code,
                    from_name: 'Nibble'
                };

                <?php
                    try {
                        //Obtendo o ID referente ao email enviado
                        $sqlSelect = "SELECT idUser FROM usuario WHERE email = :email";
                        $statementSelect = $pdo->prepare($sqlSelect);
                        $statementSelect->bindParam(':email', $email);
                        $statementSelect->execute();
                        $resultSelect = $statementSelect->fetch();
                        ?><script>console.log("Result ID: " + <?php echo json_encode($resultSelect['idUser']); ?>)</script><?php
                    } catch(Error $erro) {
                        echo "ERRO " . $erro->getMessage();
                    }

                    //Criação do código aleatório
                    $code = random_int(10000000000, 99999999999);

                    try {
                        //Inserindo o código para recuperação de senha no banco
                        $sqlInsert = "INSERT INTO codigosRecuperacao (code, idUser) VALUES (:code, :idUser);";
                        $statement = $pdo->prepare($sqlInsert);
                        $statement->bindParam(":code", $code);
                        $statement->bindParam(":idUser", $resultSelect['idUser']);
                        $statement->execute();
                        ?><script>console.log("Registro codigos")</script><?php
                    } catch(Error $erro) {
                        echo "ERRO " . $erro->getMessage();
                    }
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
        ?><script>alert("Este email não está cadastrado. Redirecionando para o login...")</script><?php
        header("Location: /nibble/paginas/login.php");
    }
?>