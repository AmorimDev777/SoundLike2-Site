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
.btnAddListMusic{
    background: transparent;
    color: gray;
    border: solid 3px gray;
}
.btnAddListMusic:hover{
    background: gray;
    color: white;
    transition: .2s;
}
</style>

<title>Listar Músicas</title>

<div class="bodyListUsers">
    <div class="containerTopOfList">
        <h1>Lista de Músicas</h1>
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
                <th class="">Titulo</th>
                <th class="">Artista Principal</th>
                <th class="">Álbum</th>
                <th class="">Gênero</th>
                <th class="">Ano de Lançamento</th>
                <th class="">Duração</th>
                <th class="">Ações</th>
            </tr>
        </thead>
        <tbody class="containerBodyTable">
    <?php
    require_once("./components/config.php");
    require_once("./components/funcao.php");
    
    $search = $_POST['search'] ?? 'a';
    
    if(mysqli_num_rows($conexao->query("SELECT * FROM musicas")) > 0) { 
        if (isset($_POST['submit'])){
            echo "<script>alert('adsada');</script>";
        }
        $sql = "SELECT * FROM musicas WHERE musicas.titulo LIKE '%$search%'";
        $conexao->query($sql);
        foreach($conexao->query($sql) as $musica) {
            $id = (int)$musica['id'];
            echo "
            <tr>
            <th>" . htmlspecialchars($musica['id']) . "</th>
            <th><img src='" . htmlspecialchars($musica['img_url']) . "' class='imgListUsers'></th>
            <th>" . htmlspecialchars($musica['titulo']) . "</th>
            <th>" . htmlspecialchars($musica['artista']) . "</th>
            <th>" . htmlspecialchars($musica['album']) . "</th>
            <th>" . htmlspecialchars($musica['genero']) . "</th>
            <th>" . htmlspecialchars($musica['ano_lancamento']) . "</th>
            <th>" . htmlspecialchars($musica['duracao']) . "</th>
            <th>
            <div class='containerAcoesListMusic'>
            <button class='btnDeletarListUsers' style='margin: 0;' title='Deletar Música' onclick='deleteMusicById({$id})'><i class='fa-solid fa-trash'></i></button>
            <form style='display:inline;' method='post' action='?listarMusicas'>
                <button type='submit' class='btnAddListMusic' title='Adicionar Artistas' name='submit'>+</button>
            </form>
            </div>
            </th>
            </tr>";
        }
    }
    ?>
        </tbody>
    </table>
</div>

<script>
    function deleteMusicById(id) {
        if (!confirm('Tem certeza que deseja deletar o musica ID ' + id + '?')) return;
        fetch('/components/funcao.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            body: 'action=deleteMusica&id=' + encodeURIComponent(id)
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
