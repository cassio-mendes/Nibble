<?php
    session_start();

    if(isset($_SESSION['nome']) && isset($_SESSION['email']) && isset($_SESSION['telefone'])) {
        $nome = $_SESSION['nome'];
        $email = $_SESSION['email'];
        $telefone = $_SESSION['telefone'];
    } else {
        header('Location: /nibble/paginas/login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/perfilCliente.css">
    <title>Perfil do Cliente</title>
</head>

<body>
    <div class="perfil-container">
        <h1>Meu Perfil</h1>
        <form>
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" disabled>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" disabled>
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" disabled>
            </div>
            <div class="input-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="tel" name="tel" placeholder="(00)00000000" disabled>
            </div>
            <button type="submit" class="btn-atualizar" id = "atualizar">Atualizar Dados</button>
        </form>
        <button class="btn-deletar" onclick="confirmarExclusao()">Deletar Conta</button>
        <a href="../index.html">
            <button class="btn-voltar">Voltar</button>
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        //utilizando o jquery para formar a mascara do telefone
        $(document).ready(function () {
            $('#tel').mask('00000000000');
        });

    </script>
    <script>
        const nome = document.getElementById("nome");
        const email = document.getElementById("email");
        const senha = document.getElementById("senha");
        const telefone = document.getElementById("telefone");
        const botaoAtualizar = document.getElementById("atualizar");

        <?php
            include_once "../config/conexao.php";

            $sql = "SELECT * FROM usuario WHERE idUser = :idUser;";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":idUser", $_SESSION['idUser']);
            $result = $statement->execute();
        ?>

        nome.value = <?php $result['nome'] ?>;
        email.value = <?php $result['email'] ?>;
        telefone.value = <?php $result['telefone'] ?>;

        botaoAtualizar.addEventListener('click', habilitarEdicao);

        function habilitarEdicao() {
            alterarFuncaoBotao(false, "Salvar alterações", salvarAlteracoes, habilitarEdicao);
        }

        function salvarAlteracoes() {
            if(nome.value !== "" && email.value !== "" && senha.value !== "" && telefone !== "") {
                try {
                    fetch('../model/atualizar-perfil.php', {
                        method: "POST",
                        headers: {'Content-type': 'application/json'},
                        body: JSON.stringify({ nome: nome.value, email: email.value, senha: senha.value, telefone: telefone.value,
                            idUser: <?php $_SESSION['idUser']; ?> })
                    });
                
                    alterarFuncaoBotao(true, "Atualizar Dados", habilitarEdicao, salvarAlteracoes);
                } catch(error) {
                    console.error(error);
                }
            } else {
                alert("Preencha todos os campos corretamente para atualizá-los");
                alterarFuncaoBotao(true, "Atualizar Dados", habilitarEdicao, salvarAlteracoes);
            }
        }

        function alterarFuncaoBotao(estado, texto, nova, atual) {
            nome.disabled = estado;
            email.disabled = estado;
            senha.disabled = estado;
            telefone.disabled = estado;

            botaoAtualizar.value = texto;
            botaoAtualizar.removeEventListener('click', atual);
            botaoAtualizar.addEventListener('click', nova);
        }

        function confirmarExclusao() {
            const confirmacao = confirm("Tem certeza de que deseja excluir sua conta? Esta ação não pode ser desfeita.");
            if (confirmacao) {
                // Redireciona para a ação de deletar conta
                window.location.href = "../controller/deletarPerfil.php";
            }
        }
    </script>
</body>

</html>