<?php
    $connection = new mysqli("52.233.90.226", "nibble", "-JCk]lNpJp", "nibble_db"); //No servidor
    //$connection = new mysqli("localhost:3307", "nibble", "-JCk]lNpJp", "Nibble"); //Local
    
    if ($connection->connect_error) {
        die("Falha na conexão" . $connection->connect_error);
    }
?>