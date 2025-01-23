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
    <link rel="stylesheet" href="../estilos/cardapioCliente.css">
    <title>Cardápio</title>
</head>

<body>
    <header>
        <h1>Cardápio</h1>
    </header>
    <section>
        <div class="botoes">
            <a href="mainPage.php">
                <img src="../img/hamb.png" alt="Logo do Site" id="logo">
            </a>

            <script>
                let img = document.getElementById("logo")

                img.onload = function () {
                    img.width = 200
                    img.height = 200
                }
            </script>
            <a href="carrinho.php">
                <button class="btn-carrinho">Carrinho</button>
            </a>
        </div>
        <?php
            include "../model/consulta-produtos.php";

            $produtos = $result;
            
            if(count($produtos) > 0) {
                ?>
                <div class="menu-container">
                    <h1>Bebidas</h1>
                    <?php foreach($produtos as $produto) {
                        if($produto['tipo'] === 'Bebida' || $produto['tipo'] === "bebida") {
                            ?>
                                <form class = "menu-item" method = "post" action = "../model/colocar-carrinho.php">
                                    <input type="hidden" name="idProduto" value="<?php echo $produto['idProduto']?>">
                                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']?>">

                                    <img src="../<?php echo $produto['imagem']?>" alt="<?php echo $produto['descricao'] ?>">
                                    <h3><?php echo $produto['nome'] ?> - R$ <?php echo $produto['preco'] ?></h3>
                                    <p><?php echo $produto['descricao'] ?></p>
                                    <button type="submit" class = "btn-adicionar" onclick="alerta()">Adicionar ao carrinho</button>
                                </form>
                            <?php
                        }
                    } ?>
                </div>

                <div class="menu-container">
                    <h1>Lanches</h1>
                    <?php foreach($produtos as $produto) {
                        if($produto['tipo'] === 'Salgado' || $produto['tipo'] === "salgado" || $produto['tipo'] === 'doce' || $produto['tipo'] === "Doce") {
                            ?>
                                <form class = "menu-item" method = "post" action = "../model/colocar-carrinho.php">
                                    <input type="hidden" name="idProduto" value="<?php echo $produto['idProduto']?>">
                                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']?>">

                                    <img src="../<?php echo $produto['imagem']?>" alt="<?php echo $produto['descricao'] ?>">
                                    <h3><?php echo $produto['nome'] ?> - R$ <?php echo $produto['preco'] ?></h3>
                                    <p><?php echo $produto['descricao'] ?></p>
                                    <button type="submit" class = "btn-adicionar" onclick="alerta()">Adicionar ao carrinho</button>
                                </form>
                            <?php
                        }
                    } ?>
                </div>
                <?php
            }
        ?> 
    </section>

    <script>
        function alerta() {
            alert("Produto adicionado ao carrinho! :)");
        }
        
        const adicionarBotoes = document.querySelectorAll('.btn-adicionar');
        adicionarBotoes.forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.menu-item');
                if (!item) {
                    alert("item nao encontrado");
                    return;
                }
                const nome = item.getAttribute('data-name');
                const preco = item.getAttribute('data-price');
                if (!nome || !preco) {
                    alert("nome ou preco nao foi encongtrado");
                    return;
                }
                let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
                carrinho.push({ nome, preco });
                localStorage.setItem('carrinho', JSON.stringify(carrinho));

                alert(`${nome} foi adicionado ao carrinho`);
            });
        });
    </script>
</body>

</html>