<?php
    //Configurações do banco
    $host = "127.0.0.1";
    $dbname = "nibble_db";
    $username = "nibble";
    $password = "-JCk]lNpJp";
    
    //Abrir conexão
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); //PHP Data Object

        //Define o modo de erro para possíveis exceções
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        exit();
    }
?>