<title>Cadastrar Artistas</title>

<div class="bodyCadastroArt">
    <h1>🎤 Cadastro de Artistas 🎤</h1>
    <form action="" method="post" class="formCadsArt">
        <div class="containerIptCadsArtistas">
            <input type="text" name="nomeArt" id="nomeArt" class="iptCadsArt" maxlength="100" required>
            <label for="nomeArt">Nome</label>
            <i class="fa-solid fa-user cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <textarea name="bioArt" id="bioArt" class="iptCadsArt bioArt" required></textarea>
            <label for="bioArt" class="bioArtLabel">Bio</label>
            <i class="fa-solid fa-file-lines bioSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="text" name="img_urlArt" id="img_urlArt" class="iptCadsArt" maxlength="999" required>
            <label for="img_urlArt">Url Img</label>
            <i class="fa-solid fa-image cadsArtSymbol"></i>
        </div>
        <input type="submit" name="submit" value="Cadastrar" class="iptCadsArt">
    </form>
</div>

<?php
    require_once './components/config.php';

    if (isset($_POST['nomeArt']) && isset($_POST['bioArt']) && isset($_POST['img_urlArt'])) {
        $nome = $_POST['nomeArt'] ?? '';
        $bio = $_POST['bioArt'] ?? '';
        $img_url = $_POST['img_urlArt'] ?? '';

        $sql = "INSERT INTO artistas (nome,bio,img_url) VALUES ('$nome','$bio','$img_url')";
        $conexao->query($sql);

        if($conexao->affected_rows > 0) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'index.php?listarArtistas';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar. Tente novamente.');</script>";
        }
    }
?>