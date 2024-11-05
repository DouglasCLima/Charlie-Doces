const box = document.querySelector(".container");
const imagens = document.querySelectorAll(".container img");

let contador = 0;
function slider() {
    contador++;

    console.log("olá");
        if(contador > imagens.length - 1) {
        contador = 0;
    }

    box.style.transform = `translateX(${-contador * 100}%)`;
}

setInterval(slider , 5000);
