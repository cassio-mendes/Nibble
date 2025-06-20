<?php 
    session_start();
    if(!isset($_SESSION['adm'])) {
        session_destroy();
        header("Location: /nibble/paginas/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitor de QR Code - Nibble</title>
    <link rel="stylesheet" href="../estilos/leitorQRcode.css">
</head>

<body>
    <div class="qr-container">
        <h1>Leitor de QR Code</h1>
        <p>Use a câmera do dispositivo para ler os QR codes dos pedidos.</p>

        <div class="startScanner">
            <video id="video" autoplay></video>
        </div>

        <p style="color: white;" id="saida"></p>

        <script src="https://cdn.jsdelivr.net/npm/@zxing/library@0.21.3/umd/index.min.js"></script>
        <script>
            const video = document.getElementById('video')
            const saida = document.getElementById('saida')
            let codeReader
            let pronto = false
            
            window.addEventListener('load', function() {
                codeReader = new ZXing.BrowserMultiFormatReader()
                codeReader.decodeFromVideoDevice(undefined, 'video', (result, err) => {
                    if(!pronto && result) {
                        //Código lido com sucesso
                        const link = result.text
                        saida.innerText = link
                        //location.href = link
                        pronto = true
                    }
                })
            })
        </script>

        <a href="../index.html">
            <button class="btn">Voltar</button>
        </a>
    </div>
</body>

</html>