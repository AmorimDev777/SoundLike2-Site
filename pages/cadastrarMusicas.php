<title>Cadastrar Músicas</title>

<div class="bodyCadastroArt">
    <h1>🎧 Cadastro de Músicas 🎧</h1>
    <form action="" method="post" class="formCadsArt">
        <div class="containerIptCadsArtistas">
            <input type="text" name="tituloMus" id="tituloMus" class="iptCadsArt" maxlength="100" required>
            <label for="tituloMus">Título</label>
            <i class="fa-solid fa-record-vinyl cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="text" name="artistaMus" id="artistaMus" class="iptCadsArt" maxlength="100" required>
            <label for="artistaMus">Artista Principal</label>
            <i class="fa-solid fa-user cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="text" name="albumMus" id="albumMus" class="iptCadsArt" maxlength="100" required>
            <label for="albumMus">Álbum</label>
            <i class="fa-solid fa-record-vinyl cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="text" name="generoMus" id="generoMus" class="iptCadsArt" maxlength="50" required>
            <label for="generoMus">Gênero</label>
            <i class="fa-solid fa-record-vinyl cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="number" name="ano_lancMus" id="ano_lancMus" class="iptCadsArt" min="1900" max="2099" required>
            <label for="ano_lancMus">Ano de Lançamento</label>
            <i class="fa-solid fa-calendar cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="time" name="duracaoMus" id="duracaoMus" class="iptCadsArt" required>
            <label for="duracaoMus">Duração</label>
            <i class="fa-solid fa-clock cadsArtSymbol"></i>
        </div>
        <div class="containerIptCadsArtistas">
            <input type="text" name="img_urlMus" id="img_urlMus" class="iptCadsArt" maxlength="999" required>
            <label for="img_urlMus">Url Img</label>
            <i class="fa-solid fa-image cadsArtSymbol"></i>
        </div>
        <input type="submit" name="submit" value="Cadastrar" class="iptCadsArt">
    </form>
</div>
<?php
    require_once './components/config.php';
    if (isset($_POST['submit'])){
        $titulo = $_POST['tituloMus'] ?? '';
        $artista = $_POST['artistaMus'] ?? '';
        $album = $_POST['albumMus'] ?? '';
        $genero = $_POST['generoMus'] ?? '';
        $ano_lancamento = $_POST['ano_lancMus'] ?? '';
        $duracao = $_POST['duracaoMus'] ?? '';
        $img_url = $_POST['img_urlMus'] ?? '';
        
        //echo ''.$titulo.' '.$artista.' '.$album.' '.$genero.' '.$ano_lanc.' '.$duracao.' '.$img_url.'';

        $sql = "INSERT INTO musicas (titulo,artista,album,genero,ano_lancamento,duracao,img_url)
        VALUES ('$titulo','$artista','$album','$genero','$ano_lancamento','$duracao','$img_url')";
        $conexao->query($sql);

        if ($conexao->affected_rows > 0) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'index.php?listarMusicas';</script>";
            exit;
        }
        else {
            echo "<script>alert('Deu erro')</script>";
        }
    }
?>
<style>
.bodyCadastroArt{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    width: 100vw;
    height: 84vh;
    gap: 30px;
}
.formCadsArt{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    
    background: black;
    height: auto;
    box-shadow: 0 0 15px white;
    gap: 10px;
    padding: 30px;
    border-radius: 20px;
    width: 440px;
}
.iptCadsArt{
    background: white;
    color: black;
    border: solid 3px white;
    padding: 10px;
    width: 100%;
    height: 50px;
    border-radius: 10px;
}
</style>