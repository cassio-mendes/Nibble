<?php
include_once "../config/conexao.php";

try {
    $novaSenha = $_POST['novaSenha'];
    $confirmarSenha = $_POST['confirmarSenha'];
    $code = $_GET['code'];

    if ($novaSenha !== $confirmarSenha) {
        echo "<script>alert('As senhas não coincidem. Tente novamente.'); history.back();</script>";
        exit();
    }

    $novasenhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);

    $sqlCodigo = "SELECT idUser FROM codigosRecuperacao WHERE code = :code";
    $stmtCodigo = $pdo->prepare($sqlCodigo);
    $stmtCodigo->bindParam(':code', $code);
    $stmtCodigo->execute();
    $resultadoCodigo = $stmtCodigo->fetch(PDO::FETCH_ASSOC);

    if (!$resultadoCodigo) {
        echo "<script>alert('Código de recuperação inválido ou expirado.'); window.location.href = 'login.php';</script>";
        exit();
    }
