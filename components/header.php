<?php
session_start();

require_once __DIR__ . '/config.php';

// Pega dados da sessão (definidos no logar.php)
$nome = $_SESSION['nome'] ?? 'Usuário';
$user_id = $_SESSION['user_id'] ?? 0;

// Busca imagem do usuário
$img_url = '/images/UsuarioPadrao.jpg'; // valor padrão
if ($user_id > 0) {
    $sql = "SELECT img_url FROM usuarios WHERE id = $user_id LIMIT 1";
    $result = $conexao->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        $img_url = $row['img_url'];
    }
}
$sairLogar = isset($_SESSION['user_id']) ? 'Sair' : 'Logar';
?>

<header class="header">
    <a href="?home" class="logoLink">
        <img src="/images/Logo.png" title="Home">
    </a>
    <nav>
        <a href="?listarMusicas" class="headerLink" title="Listar">Listar Músicas</a>
        <a href="?cadastrarMusicas" class="headerLink" title="Cadastrar">Cadastrar Músicas</a>
    </nav>
    <div style="display: flex; align-items: center; gap: 10px">
        <p class="nomeProfileHome"><?php echo htmlspecialchars($nome); ?></p>
        <div class="spaceForProfileImg">
            <img src="<?php echo htmlspecialchars($img_url); ?>" id="profileImg" class="profileImg" title="Perfil">
            <div id="profileOptions" class="profileOptions">
                <a href="/pages/configuracoes.php" class="profileOption"><i class="fa-solid fa-gear profileIcon"></i> Configurações</a>
                <hr>
                <a href="/pages/alterarImagem.php" class="profileOption"><i class="fa-solid fa-palette profileIcon"></i> Personalizar</a>
                <hr>
                <a href="/components/logout.php" class="profileOption"><i class="fa-solid fa-right-from-bracket profileIcon"></i> <?php echo htmlspecialchars($sairLogar) ?></a>
            </div>
        </div>
    </div>
</header>
<div class="headerSpace"></div>

<style>

</style>