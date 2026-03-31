const botao = document.getElementById("salvar");
const input = document.getElementById("nome");
const paragrafo = document.getElementById("texto");

console.log(input);

function imprimeOi(){
    const valorInput = input.value;
    window.alert(valorInput);
    input.value= "";
    paragrafo.textContent = valorInput;
}
botao.addEventListener('click', imprimeOi);

//*----------------- */

let contador = 0;
const valorContador = document.getElementById("numero")
const botaoMais = document.getElementById("mais");
const botaoMenos = document.getElementById("menos");

function acrescenta(){
    contador ++;
    valorContador.textContent = contador;
}

function diminui(){
    contador --;
    valorContador.textContent = contador;
}


botaoMais.addEventListener('click', acrescenta);
botaoMenos.addEventListener('click', diminui);

//*----------------- */

const primeiroNumero = document.getElementById("numero1");
const segundoNumero = document.getElementById("numero2");
let resultadoTexto = document.getElementById("resultado");

const botaoSoma = document.getElementById("btnMais");
const botaoSubtracao = document.getElementById("btnMenos")
const botaoMultiplicacao = document.getElementById("btnMultiplicacao");
const botaoDivisao = document.getElementById("btnDivisao");

function pegarValores() {
    const numero1 = Number(primeiroNumero.value);
    const numero2 = Number(segundoNumero.value);
    return { numero1, numero2 };
}

function soma() {
    const {numero1, numero2} = pegarValores();
    const resultado = numero1 + numero2;
    resultadoTexto.textContent = resultado;
}

function subtracao() {
    const {numero1, numero2} = pegarValores();
    const resultado = numero1 - numero2;
    resultadoTexto.textContent = resultado;
}

function multiplicacao() {
    const {numero1, numero2} = pegarValores();
    const resultado = numero1 * numero2;
    resultadoTexto.textContent = resultado;
}

function divisao() {
    const {numero1, numero2} = pegarValores();
    const resultado = numero1 / numero2;
    resultadoTexto.textContent = resultado;
}

botaoSoma.addEventListener('click', soma);
botaoSubtracao.addEventListener('click', subtracao);
botaoMultiplicacao.addEventListener('click', multiplicacao);
botaoDivisao.addEventListener('click', divisao);

//*----------------- */

const algoDigitado = document.getElementById("algo");
const adicionar = document.getElementById("adicionar");
const listaIten = document.getElementById("itens");

function adicionaIten(){
     const texto = algoDigitado.value;
    if (texto === "") return;

    const novoIten = document.createElement("li");
    novoIten.textContent = texto;
    listaIten.appendChild(novoIten);
    algoDigitado.value = "";
}

adicionar.addEventListener('click', adicionaIten);