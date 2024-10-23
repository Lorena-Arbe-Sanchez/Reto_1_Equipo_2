let enunciado = document.getElementById("enunciado");
let tema = document.getElementById("tema");
let descripcion = document.getElementById("descripcion");

let crearPregunta = document.getElementById("bCrearPregunta");

crearPregunta.addEventListener("click",validarCreacion)

function validarCreacion() {

    if(enunciado.value==""){
        alert('El enunciado no puede estar vacío');
        enunciado.focus();
    }

    if(descripcion.value==""){
        alert('La descripción no puede estar vacía');
        descripcion.focus();
    }

}
