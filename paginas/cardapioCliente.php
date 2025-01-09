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
            <a href="mainPageADM.php">
                <img src="../img/hamb.png" alt="Logo do Site" id="logo">
            </a>

            <script>
                let img = document.getElementById("logo")

                img.onload = function () {
                    img.width = 200
                    img.height = 200
                }
            </script>
            <a href="Carrinho.php">
                <button class="btn-carrinho">Carrinho</button>
            </a>
        </div>
        <div class="menu-container">
            <h1>Bebidas</h1>
            <form class="menu-item" data-name="Fanta Laranja" data-price="3.00" data-description="Fanta laranja"
                data-image="fanta.png" method="post" action="carrinho.php">
                <img src="../img/fanta.png" alt="Refri de Laranja">
                <h3>Fanta Laranja - R$ 3,00</h3>
                <p>Refrigerante "fanta" de laranja</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar" onclick>Adicionar ao Carrinho</button>
                </a>
            </form>
            <div class="menu-item" data-name="Coca-cola" data-price="3.00" data-description="Coca-cola"
                data-image="cocacola.jpg">
                <img src="../img/cocacola.png" alt="Refri Coca">
                <h3>Coca-cola - R$ 3,00</h3>
                <p>Refrigerante coca-cola</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Guaraná" data-price="3.00" data-description="Guaraná"
                data-image="guarana.png">
                <img src="../img/guarana.png" alt="Guaraná">
                <h3>Guaraná - R$ 3,00</h3>
                <p>Refrigerante Guaraná</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Sprite" data-price="3.00" data-description="Sprite"
                data-image="sprite.png">
                <img src="../img/sprite.png" alt="Sprite">
                <h3>Sprite - R$ 3,00</h3>
                <p>Refrigerante Sprite</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Café" data-price="1.00" data-description="Café" data-image="cafe.png">
                <img src="../img/cafe.png" alt="Café">
                <h3>Café - R$ 1,00</h3>
                <p>Café</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Água" data-price="2.00" data-description="Água" data-image="agua.png">
                <img src="../img/agua.png" alt="Água">
                <h3>Água - R$ 2,00</h3>
                <p>Água sem Gás</p>
                <a href="carrinho.php"></a>
                <button class="btn-adicionar">Adicionar ao Carrinho</button>
            </div>
            <div class="menu-item" data-name="Água com Gás" data-price="2.50" data-description="Água com Gás"
                data-image="aguagas.png">
                <img src="../img/aguagas.png" alt="Água com Gás">
                <h3>Água com Gás - R$ 2,50</h3>
                <p>Água com Gás</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
        </div>

        <div class="menu-container">
            <h1>Comidas</h1>
            <div class="menu-item" data-name="Coxinha" data-price="6.50" data-description="Coxinha"
                data-image="coxinha.jpg">
                <img src="../img/coxinha.jpg" alt="Coxinha">
                <h3>Coxinha - R$ 6,50</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="MiniPizza" data-price="3.00" data-description="MiniPizza"
                data-image="minipizza.png">
                <img src="../img/minipizza.png" alt="MiniPizza">
                <h3>MiniPizza - R$ 3,00</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Pão de Queijo" data-price="3.00" data-description="Pão de Queijo"
                data-image="paodequeijo.png">
                <img src="../img/paodequeijo.png" alt="Pão de Queijo">
                <h3>Pão de Queijo - R$ 3,00</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Salsichão" data-price="6.50" data-description="Salsichão"
                data-image="salsicha.png">
                <img src="../img/salsicha.png" alt="Salsichão">
                <h3>Salsichãoo - R$ 6,50</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Joelho" data-price="6.50" data-description="Joelho"
                data-image="joelho.jpg">
                <img src="../img/joelho.jpg" alt="Joelho">
                <h3>Joelho - R$ 6,50</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Empada de Frango" data-price="6.50" data-description="Empada de Frango"
                data-image="empada.jpg">
                <img src="../img/empada.jpg" alt="Empada de Frango">
                <h3>Empada de Frango - R$ 6,50</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Empada de Frango com Catupiry" data-price="6.50"
                data-description="Empada de Frango com Catupiry" data-image="empadaFrangoCap.jpg">
                <img src="../img/empadaFrangoCap.jpg" alt="Empada de Frango com Catupiry">
                <h3>Empada de Frango com Catupiry - R$ 6,50</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
            <div class="menu-item" data-name="Empada de Bacon" data-price="6.50" data-description="Empada de Bacon"
                data-image="empadaBacon.jpg">
                <img src="../img/empadaBacon.jpg" alt="Empada de Bacon">
                <h3>Empada de Bacon - R$ 6,50</h3>
                <p>Salgado</p>
                <a href="carrinho.php">
                    <button class="btn-adicionar">Adicionar ao Carrinho</button>
                </a>
            </div>
        </div>
    </section>
    <script>
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