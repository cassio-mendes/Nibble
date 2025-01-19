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

    $idUser = $resultadoCodigo['idUser'];

    $sqlatualizaSenha = "UPDATE usuario SET senha = :senha WHERE idUser = :idUser";
    $stmtatualizaSenha = $pdo->prepare($sqlAtualizaSenha);
    $stmtatualizaSenha->bindParam(':senha', $novasenhaCriptografada);
    $stmtatualizaSenha->bindParam(':idUser', $idUser);
    $stmtatualizaSenha->execute();

    $sqlremoveCodigo = "DELETE FROM codigosRecuperacao WHERE code = :code";
    $stmtremoveCodigo = $pdo->prepare($sqlRemoveCodigo);
    $stmtremoveCodigo->bindParam(':code', $code);
    $stmtremoveCodigo->execute();

    echo "<script>alert('Senha redefinida com sucesso!'); window.location.href = 'login.php';</script>";
} catch (Exception $e) {
    echo "<script>alert('Ocorreu um erro ao redefinir a senha. Tente novamente mais tarde.');</script>";
    error_log("Erro: " . $e->getMessage());
}
