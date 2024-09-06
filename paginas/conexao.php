<?php
    $connection = new mysqli("localhost:3307", "nibble", "-JCk]lNpJp", "Nibble"); //No servidor
    $connection = new mysqli("localhost:3307", "nibble", "-JCk]lNpJp", "Nibble"); //Local

    if ($connection->connect_error) {
        die("Falha na conexão" . $connection->connect_error);
    }
?>