<?php
    include_once "../config/conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    $idUser = $_POST['idUser'];

    try {
        $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, telefone = :telefone WHERE idUser = :idUser;";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":nome", $nome);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":senha", $senha);
        $statement->bindParam(":telefone", $telefone);
        $statement->bindParam(":idUser", $idUser);
        $statement->execute();

        header("Location: /nibble/paginas/perfilCliente.php");
    } catch(Error $erro) {
        echo $erro->getMessage();
    }
    
?>