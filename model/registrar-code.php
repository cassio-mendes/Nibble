<?php
    include_once "../config/conexao.php";
    
    //Aqui, a função file_get_contents lê o conteúdo recebido;
    //Já a função json_decode recebe a requisição HTTP para converter os dados num array PHP, onde true indica que esse array será
    //associativo (chave-valor)
    $data = json_decode(file_get_contents("php://input"), true);

    if(isset($data['code'])) {
        //O código existe
        $sqlSelect = "SELECT idUser FROM usuario WHERE email = '" . $data['user_email'] . "'";
        $statement = $pdo->prepare($sqlSelect);
        $statement->execute();
        $result = $statement->fetch();

        $sqlInsert = "INSERT INTO codigosRecuperacao (code, idUser) VALUES (" . $data['code'] . ", " . $result['idUser'] . ");";
        $statement = $pdo->prepare($sqlInsert);
        $statement->execute();
    }
?>