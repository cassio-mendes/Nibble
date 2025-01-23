<?php 
    session_start();
    if(!isset($_SESSION['adm']) || $_SESSION['adm'] === 0) {
        session_destroy();
        header("Location: /nibble/paginas/login.php");
        exit();
    }

    include_once "../config/conexao.php";

    $sql = "SELECT * FROM produto WHERE idProduto = :idProduto;";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":idProduto", $_GET['idProduto']);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/atualizarItem.css">
    <title>Atualizar item do Cardápio</title>
</head>

<body>
    <div class="cardapio-container">
        <h1>Atualizar item do Cardápio</h1>
        <form action="../model/atualizar-produto.php" method="post">
            <div class="input-group">
                <label for="nome-produto">Novo nome do Produto</label>
                <input type="text" id="atualiza-nome-produto" name="atualiza-nome-produto" required
                value="<?php echo $result['nome'] ?>">
            </div>
            <div class="input-group">
                <label for="preco-produto">Novo preço (R$)</label>
                <input type="number" id="atualiza-preco-produto" name="atualiza-preco-produto" required
                value="<?php echo $result['preco'] ?>">
            </div>

            <div class="input-group">
                <label for="descricao-produto">Nova descrição do produto:</label>
                <textarea id="atualiza-descricao-produto" name="atualiza-descricao-produto" rows="4" required>
                    <?php echo $result['descricao'] ?>
                </textarea>
            </div>

            <button type="submit" class="cardapio-btn">Salvar</button>
        </form>
        <a href="cardapio.php">
            <button class="cardapio-btn">Voltar</button>
        </a>
    </div>

</body>
</html>
