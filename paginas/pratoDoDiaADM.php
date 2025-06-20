<?php 
    session_start();
    if(!isset($_SESSION['adm']) || $_SESSION['adm'] === 0) {
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
    <link rel="stylesheet" href="../estilos/pratoDoDiaADM.css">
    <title>Gerenciamento do Prato do Dia - Nibble</title>
</head>
<body>
    <div class="prato-admin-container">
        <h1>Gerenciar Prato do Dia</h1>
        <form id="pratoDoDiaForm">
            <div class="input-group">
                <label for="data">Data</label>
                <input type="date" id="data" name="data" required>
            </div>
            <br>
            <div class="input-group">
                <label for="almoco">Horário do Almoço</label>
                <input type="text" id="almoco" name="almoco" placeholder="Ex.: 10:30h. às 13:30h." required>
            </div>
            <br>
            <div class="input-group">
                <label for="salada1">Salada 1</label>
                <input type="text" id="salada1" name="salada1" required>
            </div>
            <br>
            <div class="input-group">
                <label for="principal">Prato Principal</label>
                <input type="text" id="principal" name="principal" required>
            </div>
            <br>
            <div class="input-group">
                <label for="vegano">Opção Vegana</label>
                <input type="text" id="vegano" name="vegano" required>
            </div>
            <br>
            <div class="input-group">
                <label for="acompanhamento">Acompanhamento</label>
                <input type="text" id="acompanhamento" name="acompanhamento" required>
            </div>
            <br>
            <div class="input-group">
                <label for="sobremesa">Sobremesa</label>
                <input type="text" id="sobremesa" name="sobremesa">
            </div>
            <br>
            <div class="input-group">
                <label for="refresco">Refresco</label>
                <input type="text" id="refresco" name="refresco" required>
            </div>
            <br>
            <button type="button" class="btn" onclick="salvarPrato()">Salvar Prato do Dia</button>
        </form>
        <br><br>
        <a href="mainPageADM.php">
            <button class="btn">Voltar</button>
        </a>
    </div>

    <script>
        function salvarPrato() {
            const pratoDoDia = {
                data: document.getElementById("data").value,
                almoco: document.getElementById("almoco").value,
                salada1: document.getElementById("salada1").value,
                principal: document.getElementById("principal").value,
                vegano: document.getElementById("vegano").value,
                acompanhamento: document.getElementById("acompanhamento").value,
                sobremesa: document.getElementById("sobremesa").value,
                refresco: document.getElementById("refresco").value
            };

            localStorage.setItem("pratoDoDia", JSON.stringify(pratoDoDia));
            alert("Prato do Dia salvo com sucesso!");
        }
    </script>
</body>
</html>
