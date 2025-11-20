<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsividae.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/images/Logo.png" type="image/x-icon">
</head>
<body class="bodyCadastro">

    <a href="/index.php?home" class="homeSimbol"><i class="fa-solid fa-house"></i></a>

    <div class="divCadastro divImgCadastro invert"></div>

    <div class="divCadastro">
        <div class="containerLogoCadastro">
            <img src="/images/Logo.png" alt="" class="logoCadastro">
            <p>Cadastro</p>
        </div>
        <form action="" method="post" class="formCadastro">
            <div class="divInputCadastro">
                <input type="text" class="inputCadastro" name="nome" maxlength="100" required>
                <label for="" class="labelCadastro">Nome</label>
                <i class="fa-solid fa-user" style="pointer-events: none;"></i>
            </div>
            <div class="divInputCadastro">
                <input type="text" class="inputCadastro" name="img_url" required>
                <label for="" class="labelCadastro">Img Url</label>
                <i class="fa-solid fa-image" style="pointer-events: none;"></i>
            </div>
            <div class="divInputCadastro">
                <input type="email" class="inputCadastro" name="email" maxlength="100" required>
                <label for="" class="labelCadastro">Email</label>
                <i class="fa-solid fa-envelope" style="pointer-events: none;"></i>
            </div>
            <div class="divInputCadastro">
                <input type="password" class="inputCadastro" id="inputSenha" name="senha" minlength="8" required>
                <label for="" class="labelCadastro">Senha</label>
                <i class="fa-solid fa-eye clickable" id="olho"></i>
            </div>
            <p>Já tem uma conta? <a href="loginUsuario.php">Logar</a></p>
            <input type="submit" value="Cadastrar" class="btnCadastro">
        </form>
    </div>

    <script src="/js/script.js"></script>

    <?php
    require_once("../components/config.php");

    if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
        $nome = $_POST['nome'] ?? '';
        $img_url = $_POST['img_url'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $sql = "INSERT INTO usuarios (nome, email, senha, img_url) VALUES ('$nome', '$email', '$senha', '$img_url')";
        $conexao->query($sql);
        if($conexao->affected_rows > 0) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'loginUsuario.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar. Tente novamente.');</script>";
        }
    }
    ?>
    <style>
.containerCard{
    display: flex;
    justify-content: center;
    position: fixed;

    top: 40px;
    width: 100vw;
}
.card{
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 20px;
    border-radius: 10px;
    gap: 20px;
}
.cardErro{
    border: solid 2px rgb(255, 0, 0);
    background: rgba(255, 100, 100, 1);
}
.cardCerto{
    border: solid 2px rgb(0, 255, 21);
    background: rgb(121, 255, 139);
}
.card p{
    color: black;
    font-size: 20px;
}
.card i{
    color: black;
    cursor: pointer;
    font-size: 26px;
}
    </style>
</body>
</html>