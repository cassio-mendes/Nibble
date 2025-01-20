<?php
include_once "../config/conexao.php";

try {
    if (!isset($_POST['code']) || empty($_POST['code'])) {
        echo "<script>alert('Código de recuperação não encontrado.'); window.location.href = 'login.php';</script>";
        exit();
    }

    $code = $_POST['code'];
    $novaSenha = $_POST['novaSenha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    if ($novaSenha !== $confirmarSenha) {
        echo "<script>alert('As senhas não coincidem. Tente novamente.'); history.back();</script>";
        exit();
    }

    $novaSenhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);

    $sqlCodigo = "SELECT idUser FROM codigosRecuperacao WHERE code = :code";
    $stmtCodigo = $pdo->prepare($sqlCodigo);
    $stmtCodigo->bindParam(':code', $code, PDO::PARAM_INT);
    $stmtCodigo->execute();
    $resultadoCodigo = $stmtCodigo->fetch(PDO::FETCH_ASSOC);

    if (!$resultadoCodigo) {
        echo "<script>alert('Código de recuperação inválido ou expirado.'); window.location.href = 'login.php';</script>";
        exit();
    }

    $idUser = $resultadoCodigo['idUser'];

    $sqlAtualizaSenha = "UPDATE usuario SET senha = :senha WHERE idUser = :idUser";
    $stmtAtualizaSenha = $pdo->prepare($sqlAtualizaSenha);
    $stmtAtualizaSenha->bindParam(':senha', $novaSenhaCriptografada);
    $stmtAtualizaSenha->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $stmtAtualizaSenha->execute();

    $sqlRemoveCodigo = "DELETE FROM codigosRecuperacao WHERE code = :code";
    $stmtRemoveCodigo = $pdo->prepare($sqlRemoveCodigo);
    $stmtRemoveCodigo->bindParam(':code', $code, PDO::PARAM_INT);
    $stmtRemoveCodigo->execute();

    echo "<script>alert('Senha redefinida com sucesso!'); window.location.href = 'login.php';</script>";
} catch (Exception $e) {
    echo "<script>alert('Ocorreu um erro ao redefinir a senha. Tente novamente mais tarde.');</script>";
    error_log("Erro: " . $e->getMessage());
}
