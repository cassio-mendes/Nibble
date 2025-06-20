<?php 
    session_start();
    if(!isset($_SESSION['adm'])) {
        session_destroy();
        header("Location: /nibble/paginas/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/pratoDoDia.css">
    <title>Prato do Dia - Nibble</title>
</head>
<body>
    <div class="prato-container">
        <h1>Prato do Dia</h1>
        <p><strong>Data:</strong> <span id="data">--/--/--</span></p>
        <p><strong>Almoço:</strong> <span id="almoco">Horário: 00:00h. às 00:00h.</span></p>
        <ul>
            <li><strong>Salada 1:</strong> <span id="salada1">---</span>      </li>     
            <li><strong>Prato Principal:</strong> <span id="principal">---</span></li>
            <li><strong>Opção Vegana:</strong> <span id="vegano">---</span></li>
            <li><strong>Acompanhamento:</strong> <span id="acompanhamento">---</span></li>
            <li><strong>Sobremesa:</strong> <span id="sobremesa">---</span></li>
            <li><strong>Refresco:</strong> <span id="refresco">---</span></li>
        </ul>
        <a href="mainPage.php">
            <button class="btn">Voltar</button>
        </a>
    </div>

    <script>
        function carregarPratoDoDia() {
            const pratoDoDia = JSON.parse(localStorage.getItem("pratoDoDia"));

            if (pratoDoDia) {
                document.getElementById("data").innerText = pratoDoDia.data;
                document.getElementById("almoco").innerText = pratoDoDia.almoco;
                document.getElementById("salada1").innerText = pratoDoDia.salada1;
                document.getElementById("principal").innerText = pratoDoDia.principal;
                document.getElementById("vegano").innerText = pratoDoDia.vegano;
                document.getElementById("acompanhamento").innerText = pratoDoDia.acompanhamento;
                document.getElementById("sobremesa").innerText = pratoDoDia.sobremesa || "---";
                document.getElementById("refresco").innerText = pratoDoDia.refresco;
            } else {
                alert("Nenhum prato do dia encontrado.");
            }
        }

        document.addEventListener("DOMContentLoaded", carregarPratoDoDia);
    </script>
</body>
</html>
