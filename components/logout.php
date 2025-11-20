<?php
session_start();

$nome = $_SESSION['nome'];

require_once "../components/config.php";

$sql = "DELETE FROM usuarios WHERE nome = '$nome' ORDER BY id DESC LIMIT 1";
if ($conexao->query($sql)) {
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    session_destroy();
    header("Location: /pages/loginUsuario.php");
    exit();
} else {
    echo "Erro ao deletar usuário: " . $conexao->error;
}
?>