<style>
.btnDeletarListUsers{
    background: transparent;
    border: solid 3px red;
}
.btnDeletarListUsers:hover{
    background: red;
    transition: .2s;
}
.btnDeletarListUsers:hover i{
    color: white;
    transition: .2s;
}
.btnDeletarListUsers i{
    color: red;
}
</style>

<title>Listar Artistas</title>

<div class="bodyListUsers">
    <div class="containerTopOfList">
        <h1>Lista de Artistas</h1>
        <form action="" method="post" class="formFiltrar">
            <input type="text" name="search">
            <button type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <table class="tableListarUsuarios">
        <thead class="containerHeadTable">
            <tr class="">
                <th class="">ID</th>
                <th class="">Img</th>
                <th class="">Nome</th>
                <th class="">Bio</th>
                <th class="">Ações</th>
            </tr>
        </thead>
        <tbody class="containerBodyTable">
    <?php
    require_once("./components/config.php");
    require_once("./components/funcao.php");
    
    if(mysqli_num_rows($conexao->query("SELECT * FROM artistas")) > 0) { 
        $sql = "SELECT * FROM artistas";
        $conexao->query($sql);
        foreach($conexao->query($sql) as $artista) {
            $id = (int)$artista['id'];
            echo "
            <tr>
            <th>" . htmlspecialchars($artista['id']) . "</th>
            <th><img src='" . htmlspecialchars($artista['img_url']) . "' class='imgListUsers'></th>
            <th>" . htmlspecialchars($artista['nome']) . "</th>
            <th style='overflow-wrap: break-word;overflow: auto;'>" . htmlspecialchars($artista['bio']) . "</th>
            <th><button class='btnDeletarListUsers' title='Deletar Artista' onclick='deleteArtistById({$id})'><i class='fa-solid fa-trash'></i></button></th>
            </tr>";
        }
    }
    ?>
        </tbody>
    </table>
</div>

<script>
    function deleteArtistById(id) {
        if (!confirm('Tem certeza que deseja deletar o artista ID ' + id + '?')) return;
        fetch('/components/funcao.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            body: 'action=deleteArtista&id=' + encodeURIComponent(id)
        })
        .then(resp => resp.json())
        .then(data => {
            if (data && data.success) {
                location.reload();
            } else {
                alert('Erro ao deletar: ' + (data && data.error ? data.error : 'erro desconhecido'));
            }
        })
        .catch(err => {
            alert('Erro na requisição: ' + err);
        });
    }
</script>