const imagem = document.getElementById("imgACDC");

function mostraAlerta(){
    window.alert("CURIOSIDADE: o vocalista de ACDC MORREU e nem é FAKE! fonte: Sor. Roveda");
}
imagem.addEventListener('click', mostraAlerta);

/*-----------------*/

let contador = 0;
const botao = document.getElementById("like");

function acrescentaLike(){
    contador ++;
    botao.textContent = contador;
}
botao.addEventListener('click', acrescentaLike);


