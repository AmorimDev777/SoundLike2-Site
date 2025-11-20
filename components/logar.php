<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/loginUsuario.php');
    exit();
}

require_once __DIR__ . '/config.php';

$nome = trim($_POST['nome'] ?? '');
$senha = $_POST['senha'] ?? '';

if ($nome === '' || $senha === '') {
    header('Location: ../pages/loginUsuario.php?error=empty');
    exit();
}

// Busca o usuário pelo nome
$stmt = $conexao->prepare('SELECT id, nome, email, senha, img_url FROM usuarios WHERE nome = ? LIMIT 1');
if (!$stmt) {
    header('Location: ../pages/loginUsuario.php?error=server');
    exit();
}

$stmt->bind_param('s', $nome);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || $result->num_rows === 0) {
    // usuário não encontrado
    $stmt->close();
    header('Location: ../pages/loginUsuario.php?error=credentials');
    exit();
}

$row = $result->fetch_assoc();
$stmt->close();

$hash = $row['senha'];

// Verifica a senha (suporta senhas com hash)
$ok = false;
if (password_verify($senha, $hash)) {
    $ok = true;
} else {
    // caso a senha esteja armazenada sem hash (não recomendado), compare diretamente
    if ($senha === $hash) $ok = true;
}

if (!$ok) {
    header('Location: ../pages/loginUsuario.php?error=credentials');
    exit();
}

// Autenticação OK — grava informações úteis na sessão
$_SESSION['user_id'] = (int)$row['id'];
$_SESSION['nome'] = $row['nome'];
$_SESSION['email'] = $row['email'] ?? '';
//$_SESSION['img_url'] = $row['img_url'] ?? '/images/UsuarioPadrao.jpg';

// Redireciona para a home
header('Location: /index.php?home');
exit();

?>