<?php 
    session_start();
    if(!isset($_SESSION['adm']) || $_SESSION['adm'] === 0) {
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
    <link rel="stylesheet" href="../estilos/cardapio.css">
    <title>Cardápio</title>
</head>

<body>
    <header>
        <h1>Cardápio</h1>
    </header>
    <section>
        <div class="botoes">
            <a href="mainPageADM.php">
                <img src="../img/hamb.png" alt="Logo do Site" id = "logo">
            </a>
            
            <script>
                let img = document.getElementById("logo")

                img.onload = function() {
                    img.width = 200
                    img.height = 200
                }
            </script>
            <a href="cardapioGerir.php">
                <button class="btn-cadastro">Adicionar Item</button>
            </a>
            <a href="mainPage.php">
                <button class="btn-voltar">Voltar</button>
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
                                <div class = "menu-item">
                                    <img src="../<?php echo $produto['imagem']?>" alt="<?php echo $produto['descricao'] ?>">
                                    <h3><?php echo $produto['nome'] ?> - R$ <?php echo $produto['preco'] ?></h3>
                                    <p><?php echo $produto['descricao'] ?></p>
                                    <form action="atualizarItem.php" method="get">
                                        <input type="hidden" name="idProduto" value="<?php echo $produto['idProduto'] ?>">
                                        <button type="submit" class = "btn-atualizar">Atualizar Item</button>
                                    </form>
                                    
                                    <form action="../model/excluir-produto.php" method="post">
                                        <input type="hidden" name="idProduto" value="<?php echo $produto['idProduto'] ?>">
                                        <button type="submit" class = "btn-excluir">Excluir Item</button>
                                    </form>
                                </div>
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
</body>

</html>