$(document).ready(function () {
    $('#tabelaCargo').DataTable();
});

let menuAlterna = document.querySelector('.alterna');
let navegador = document.querySelector('.navegador');


menuAlterna.onclick = function () {
    menuAlterna.classList.toggle('active');
    navegador.classList.toggle('active');
}


let cargos = document.querySelector('.cargos');
let tabelaCargos = document.querySelector('.posicao');
let btn = document.querySelector('.b');
let movimentos = document.querySelector('.movimentos');
let estoque = document.querySelector('.estoque');
let cadastro = document.querySelector('.cadastro');
let home = document.querySelector('.home');

home.onclick = function () {
    tabelaCargos.className = 'posicao container w-75 pt-5 d-none d-print-block';
    btn.className = 'b btn btn-outline-primary d-none d-print-block';
    console.log(btn);
}

cadastro.onclick = function () {
    tabelaCargos.className = 'posicao container w-75 pt-5 d-none d-print-block';
    btn.className = 'b btn btn-outline-primary d-none d-print-block';
    console.log(btn);
}

estoque.onclick = function () {
    tabelaCargos.className = 'posicao container w-75 pt-5 d-none d-print-block';
    btn.className = 'b btn btn-outline-primary d-none d-print-block';
    console.log(btn);
}

movimentos.onclick = function () {
    tabelaCargos.className = 'posicao container w-75 pt-5 d-none d-print-block';
    btn.className = 'b btn btn-outline-primary d-none d-print-block';
    console.log(btn);
}

cargos.onclick = function () {
    tabelaCargos.className = 'posicao container w-75 pt-5';
    btn.className = 'b btn btn-outline-primary  pt-1';
    console.log(btn);
}

let lista = document.querySelectorAll('.lista');
for (let i = 0; i < lista.length; i++) {
    lista[i].onclick = function () {
        let j = 0;
        while (j < lista.length) {
            lista[j++].className = 'lista';
        }
        lista[i].className = 'lista active';
        console.log(
            document.getElementsByClassName("lista")[4]
        )

    }
}