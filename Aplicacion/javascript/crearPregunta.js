let enunciado = document.getElementById("enunciado");
let tema = document.getElementById("tema");
let descripcion = document.getElementById("descripcion");

let crearPregunta = document.getElementById("bCrearPregunta");
let modificar = document.getElementById("bModificar");

crearPregunta.addEventListener("click",validarCreacion)

function validarCreacion() {

    if(enunciado.value==""){
        alert('El enunciado no puede estar vacío');
    }

    if(descripcion.value==""){
        alert('La descripción no puede estar vacía');
    }

}
