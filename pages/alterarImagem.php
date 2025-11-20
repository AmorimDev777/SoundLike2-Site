<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsividae.css">

    <title>Personalizar</title>

</head>
<body class="bodyAlterarImagem">

    <?php
        session_start();

        require_once("../components/config.php");
        
        $nome = $_SESSION['nome'] ?? '';

        $sql = "SELECT img_url FROM usuarios WHERE nome = '$nome' ORDER BY id DESC LIMIT 1";
        $result = $conexao->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            $img_url = $row['img_url'];
            $sql = "UPDATE usuarios SET img_url = '" . ($_POST['newImgUrl'] ?? $img_url) . "' WHERE nome = '$nome' ORDER BY id DESC LIMIT 1";
            $conexao->query($sql);
        } else {
            $img_url = '/images/UsuarioPadrao.jpg';
            if (isset($_POST['submit'])){
                echo "<div class='containerCard'>
                        <div class='card cardErro'>
                            <p>Precisa estar logado para mudar imagem</p>
                            <i class='fa-solid fa-xmark' id='xCard' onclick='esconder()'></i>  
                        </div>
                      </div>";
            } 
        }
    ?>

    <a href="/index.php?home"><i class="fa-solid fa-arrow-left arrowAlterarImagem"></i></a>

    <img src="<?php echo htmlspecialchars($img_url); ?>" alt="" id="imgAlterarImagem">

    <form action="" method="post" class="formAlterarImagem">
        <input type="text" name="newImgUrl" placeholder="Nova URL da Imagem" required>
        <input type="submit" value="Enviar" name="submit">
    </form>

    <p class="atualizarImgUrl">Atualizar <i class="fa-solid fa-rotate" onclick="location.reload()"></i></p>

    <div class="containerImgAmplificada" id="containerImgAmplificada">
        <div class="divImgAmplificada">
            <!--<i class="fa-solid fa-arrow-left arrowAlterarImagem" id="arrowCloseAplification"></i>-->
            <img src="<?php echo htmlspecialchars($img_url); ?>" alt="">
        </div>
    </div>

    <script>
        let containerImgAmplificada = document.getElementById("containerImgAmplificada")
        //let arrowCloseAplification = document.getElementById("arrowCloseAplification")
        let imgAlterarImagem = document.getElementById("imgAlterarImagem")
        
        containerImgAmplificada.addEventListener("click", () => {
            document.querySelector(".containerImgAmplificada").style.display = "none"
        })
        imgAlterarImagem.addEventListener("click", () => {
            document.querySelector(".containerImgAmplificada").style.display = "block"
        })

        let card = document.getElementsByClassName('containerCard')[0]

        function esconder() {
            card.classList.add("hide")
        }
    </script>
</body>
</html>