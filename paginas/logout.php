<?php
    session_start();
    session_destroy();
    header("Location: /nibble/paginas/login.php");
?>