<title>SoundLike - Home</title>

<div class="bodyHome">
    <div class="containerContentHome">
        <div class="divTituloHome">
            <h1>Sound<span class="azulClaro">Like</span></h1>
            <h2>Musics</h2>
        </div>
        <p>Bem-vindo <?php 
        $nome = $_SESSION['nome'] ?? 'Usuário';
        echo "<span style='color: rgb(0, 217, 255)'>".htmlspecialchars($nome)."</span>";
        ?> ao SoundLike, a plataforma definitiva para os amantes da música! Aqui, você pode explorar, criar e gerenciar suas coleções musicais de forma simples e intuitiva.</p>
        <div class="containerIconsHome">
            <div class="divIconsHome">
                <div class="fundoIcon"></div>
                <a href="https://www.whatsapp.com/?lang=pt" class="iconsHome"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
            <div class="divIconsHome">
                <div class="fundoIcon"></div>
                <a href="https://x.com" class="iconsHome"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
            <div class="divIconsHome">
                <div class="fundoIcon"></div>
                <a href="https://www.instagram.com" class="iconsHome"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="containerImgHome">
        <img src="/images/VinilAzul.png" alt="" class="vinilHome running" id="vinilHome">
        <div class="containerBtnHome">
            <div class="divBtnHome">
                <div class="fundoBtn"></div>
                <a href="?listarArtistas">Listar Artistas</a>
            </div>
            <div class="divBtnHome">
                <div class="fundoBtn"></div>
                <a href="?cadastrarArtistas">Cadastrar Artistas</a>
            </div>
        </div>
    </div>
</div>

<script>
    let vinilHome = document.getElementById("vinilHome")

    vinilHome.addEventListener("click", () => {
        if (vinilHome.classList.contains("running")){
            vinilHome.classList.add("paused")
            vinilHome.classList.remove("running")
        }
        else{
            vinilHome.classList.add("running")
            vinilHome.classList.remove("paused")
        }
    })
</script>