<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsividae.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./images/Logo.png" type="image/x-icon">
</head>
<body>
    <?php
        require_once("./components/header.php");

        if(isset($_GET['home'])){
            include_once "./pages/home.php";
        }

        if(isset($_GET['listarMusicas'])){
            include_once "./pages/listarMusicas.php";
        }

        if(isset($_GET['cadastrarMusicas'])){
            include_once "./pages/cadastrarMusicas.php";
        }

        if(isset($_GET['listarArtistas'])){
            include_once "./pages/listarArtistas.php";
        }

        if(isset($_GET['cadastrarArtistas'])){
            include_once "./pages/cadastrarArtistas.php";
        }

        if(!array_intersect_key(array_flip(['home','listarMusicas','cadastrarMusicas','listarArtistas','cadastrarArtistas','gerenciar']), $_GET)) {
            include_once "./pages/erro.php";
        }
    ?>
    <script src="./js/script.js"></script>
</body>
</html>
<style>
    body{
        background: linear-gradient(to bottom, rgb(12, 12, 12), black);
        height: 100vh;
    }
</style>