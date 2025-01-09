<?php 
    session_start();
    if(!isset($_SESSION['adm']) || $_SESSION['adm'] === 1) {
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
    <link rel="stylesheet" href="../estilos/cardapioGerir.css">
    <title>Gerenciamento do Cardápio</title>
</head>

<body>
    <div class="cardapio-container">
        <h1>Adicionar item ao Cardápio</h1>
        <form method = "post" action = "../model/cadastrar-produto.php">
            <div class="input-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="input-group">
                <label for="tipo">Tipo de Produto</label>
                <select id="tipo" name="tipo" required>
                    <option value="nenhum">Nenhum</option>
                    <option value="bebida">Bebida</option>
                    <option value="salgado">Salgados</option>
                    <option value="doce">Doces</option>
                    <option value="outros">Outros</option>
                </select>
            </div>
            <div class="input-group">
                <label for="preco">Preço (R$)</label>
                <input type="number" id="preco" name="preco" required>
            </div>

            <div class="input-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>
            </div>

            <div id="imgDiv">
                <label for="img" style="color: #666666;">Imagem: </label>
                <input type="file" name="img" accept="image/*" id="img" oninput="mostrarImg()"> <br><br>
            </div>

            <button type="submit" class="cardapio-btn">Salvar</button>
        </form>
        <a href="cardapio.php">
            <button class="cardapio-btn">Voltar</button>
        </a>
    </div>

    <script>
        function mostrarImg() {
            let div = document.getElementById("imgDiv")
            let elementos = div.getElementsByTagName("img") //Contém os elementos img da div
            
            if(elementos[0] != null) { //Se houver um img, ele é removido para garantir que haja apenas uma imagem na tela
                div.removeChild(elementos[0])
            }   
            
            let img = document.createElement("img")
            let input = document.getElementById("img")

            let arquivo = input.files[0] //Armazena o primeiro (e único) arquivo selecionado pelo usuário
            let leitor = new FileReader() //Um FileReader será usado para ler o arquivo 

                leitor.onload = function (arq) { //Essa função será executada quando o arquivo terminar de ser lido
                //arq.target é o própio FileReader que carregou o arquivo, e result tem os dados que foram lidos
                
                    img.onload = function() {
                        let novoHeight = (img.height * 500) / img.width
                        img.width = 500
                        img.height = novoHeight
                    }

                    img.src = arq.target.result
                }

            leitor.readAsDataURL(arquivo) //Aqui, a função acima é executada e o result é definido como uma String de base64 que será usada
            //como URL de Imagem para mostrá-la na tela 

            div.appendChild(img) //Mostrando a imagem inserida
        }
    </script>
</body>

</html>