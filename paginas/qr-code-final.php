<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/qr-code-final.css">
    <title>Pedido Pronto!</title>
</head>

<body>
    <form action="" class="form-container">
        <h1>Seu pedido está pronto!</h1>
        <h2>Agora você só precisa apresentar o QR Code abaixo na cantina para pegar seu pedido:</h2>

        <img src="https://via.placeholder.com/400x400.png?text=400x400" alt="QR Code referente ao pedido" id="img"> <br><br><br>

        <input type="button" value="Voltar à Página Inicial" class="btn">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
    <script>
        let img = document.getElementById("img")

        <?php
            include_once "../config/conexao.php";

            $sql = "SELECT token FROM pedido WHERE idUser = :idUser";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":idUser", $_SESSION['idUser']);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $pedidoPronto;
            foreach($result as $pedido) {
                if(!$result['status']) {
                    $pedidoPronto = $pedido;
                    break;
                }
            }
        ?>

        //let codigo = <?php echo $pedidoPronto['token'] ?>;
        let codigo = "TESTE";

        QRCode.toDataURL(codigo, function(err, url) { //Essa função, da biblioteca qrcode, irá criar uma imagem QR Code contendo codigo
            if (err) throw err //Ignora possíveis erros  

            img.onload = function() { //Redimensiona a imagem quando ela tiver sido totalmente lida
                let novoHeight = (img.height * 400) / img.width
                img.width = 400
                img.height = novoHeight
            }

            img.src = url //Mostra o QR Code pronto na tela
        })
    </script>
</body>

</html>