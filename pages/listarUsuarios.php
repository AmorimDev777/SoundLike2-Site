<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="/images/Logo.png" type="image/x-icon">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/responsividade.css">

<title>ADM - Lista de Usuários</title>

<body class="bodyListUsers">
    <table class="tableListarUsuarios">
        <thead class="containerHeadTable">
            <tr class="">
                <th class="">ID</th>
                <th class="">Img</th>
                <th class="">Nome</th>
                <th class="">Email</th>
                <th class="">Senha</th>
                <th class="">Data Criação</th>
                <th class="">Ações</th>
            </tr>
        </thead>
        <tbody class="containerBodyTable">
    <?php
    require_once("../components/config.php");
    require_once("../components/funcao.php");
    
    if(mysqli_num_rows($conexao->query("SELECT * FROM usuarios")) > 0) { 
        $sql = "SELECT * FROM usuarios";
        $conexao->query($sql);
        foreach($conexao->query($sql) as $usuario) {
            $id = (int)$usuario['id'];
            echo "
            <tr>
            <th>" . htmlspecialchars($usuario['id']) . "</th>
            <th><img src='" . htmlspecialchars($usuario['img_url']) . "' class='imgListUsers'></th>
            <th>" . htmlspecialchars($usuario['nome']) . "</th>
            <th>" . htmlspecialchars($usuario['email']) . "</th>
            <th>" . htmlspecialchars($usuario['senha']) . "</th>
            <th>" . htmlspecialchars($usuario['data_criacao']) . "</th>
            <th><button class='btnDeletarListUsers' title='Deletar Usuário' onclick='deleteUserById({$id})'><i class='fa-solid fa-trash'></i></button></th>
            </tr>";
        }
    }
    ?>
        </tbody>
    </table>
</body>

<script>
    function deleteUserById(id) {
        if (!confirm('Tem certeza que deseja deletar o usuário ID ' + id + '?')) return;
        fetch('/components/funcao.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
            body: 'action=deleteUsuario&id=' + encodeURIComponent(id)
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

<style>

</style>