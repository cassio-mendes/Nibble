<?php
include_once "../config/conexao.php";

try {
    $email = $_POST['email'];

    $sqlEmail = "SELECT idUser, email FROM usuario WHERE email = :email;";
    $statementEmail = $pdo->prepare($sqlEmail);
    $statementEmail->bindParam(':email', $email);
    $statementEmail->execute();
    $resultEmail = $statementEmail->fetch(PDO::FETCH_ASSOC);

    if ($resultEmail) {
        // ciracao do codigo aleatorio de onzw digitos
        $code = random_int(10000000000, 99999999999);

        $sqlInsert = "INSERT INTO codigosRecuperacao (code, idUser) VALUES (:code, :idUser);";
        $statementInsert = $pdo->prepare($sqlInsert);
        $statementInsert->bindParam(":code", $code);
        $statementInsert->bindParam(":idUser", $resultEmail['idUser']);
        $statementInsert->execute();

        ?>
        <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
        <script type="text/javascript">
            (function () {
                emailjs.init("PLBOnk1RvPBlgwrzV");
            })();

            const templateParams = {
                user_email: <?php echo json_encode($email); ?>,
                link_redefine: "https://feiratec.dev.br/nibble/paginas/senhaRecuperada.html?code=" + <?php echo json_encode($code); ?>,
                from_name: 'Nibble'
            };

            emailjs.send('service_b9zkh8s', 'template_o38aeff', templateParams)
                .then(function (response) {
                    alert('E-mail enviado com sucesso!');
                    window.location.href = "/nibble/paginas/login.php"; // Redireciona para o login
                }, function (error) {
                    alert('Erro ao enviar o e-mail. Verifique sua conexão.');
                    console.log(error);
                });
        </script>
        <?php
    } else {
        echo '<script>alert("Este email não está cadastrado. Redirecionando para o login..."); window.location.href="/nibble/paginas/login.php";</script>';
    }
} catch (Exception $e) {
    echo '<script>alert("Ocorreu um erro no sistema. Tente novamente mais tarde."); console.error('.json_encode($e->getMessage()).');</script>';
}
?>
