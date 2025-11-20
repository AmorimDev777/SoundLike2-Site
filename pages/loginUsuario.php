<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsividae.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/images/Logo.png" type="image/x-icon">
</head>
<body class="bodyCadastro">

    <a href="/index.php?home" class="homeSimbol"><i class="fa-solid fa-house"></i></a>

    <div class="divCadastro">
        <div class="containerLogoCadastro">
            <img src="/images/Logo.png" alt="" class="logoCadastro">
            <p>Login</p>
        </div>
        <form action="/components/logar.php" method="post" class="formCadastro">
            <div class="divInputCadastro">
                <input type="text" class="inputCadastro" name="nome" required>
                <label for="" class="labelCadastro">Nome</label>
                <i class="fa-solid fa-user" style="pointer-events: none;"></i>
            </div>
            <div class="divInputCadastro">
                <input type="password" class="inputCadastro" name="senha" id="inputSenha" required>
                <label for="" class="labelCadastro">Senha</label>
                <i class="fa-solid fa-eye clickable" id="olho"></i>
            </div>
            <p>Ainda não tem uma conta? <a href="cadastroUsuario.php">Cadastrar</a></p>
            <input type="submit" value="Logar" class="btnCadastro">
        </form>
    </div>

    <div class="divCadastro divImgCadastro"></div>

    <script src="/js/script.js"></script>
</body>
</html>