let eye = document.getElementById("olho");
let inputpassword = document.getElementById("inputSenha");

eye.addEventListener("click", () => {
    if(eye.classList.contains("fa-eye")){ 
        inputpassword.type = "text"
        eye.classList.remove("fa-eye")
        eye.classList.add("fa-eye-slash")
    }
    else{
        inputpassword.type = "password"
        eye.classList.remove("fa-eye-slash")
        eye.classList.add("fa-eye")
    }
})

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