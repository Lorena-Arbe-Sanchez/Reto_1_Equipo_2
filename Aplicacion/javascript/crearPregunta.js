let crearPregunta = document.getElementById("bCrearPregunta");

crearPregunta.addEventListener("click", (event) => validarCreacion(event));

function validarCreacion(event) {

    event.preventDefault();

    let enunciado = document.getElementById("enunciado").value;
    let tema = document.getElementById("tema").value;
    let descripcion = document.getElementById("descripcion").value;

    if(!enunciado){
        alert('El enunciado debe ser rellenado.');
        enunciado.focus();
    }
    // TODO : Poner la validación del tema (que haya algo seleccionado (y no se la opción -1; añadir un "Seleccionar")).
    if(!descripcion){
        alert('La descripción debe ser rellenada.');
        descripcion.focus();
    }

}