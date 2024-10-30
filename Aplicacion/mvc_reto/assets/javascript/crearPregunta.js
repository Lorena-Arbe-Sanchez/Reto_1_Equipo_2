let crearPregunta = document.getElementById("bCrearPregunta");
let formulario = document.getElementById("formCrearPregunta");

crearPregunta.addEventListener("click", (event) => validarCreacion(event));

function validarCreacion(event) {

    event.preventDefault();

    let enunciadoCasilla = document.getElementById("titulo");
    let enunciado = enunciadoCasilla.value;
    let temaCasilla = document.getElementById("tema");
    let descripcionCasilla = document.getElementById("descripcion");
    let descripcion = descripcionCasilla.value;

    // Comprobar si alguna de las casillas está vacía / sin seleccionar.
    if (!enunciado || temaCasilla.selectedIndex === 0 || !descripcion){

        if (!enunciado && temaCasilla.selectedIndex === 0 && !descripcion){
            alert('Las 3 casillas deben ser rellenadas.');
            enunciadoCasilla.focus();
        }
        else{
            if(!enunciado){
                alert('El enunciado debe ser rellenado.');
                enunciadoCasilla.focus();
            }
            else{
                if (temaCasilla.selectedIndex === 0){
                    alert('El tema debe ser seleccionado.');
                    temaCasilla.focus();
                }
                else{
                    alert('La descripción debe ser rellenada.');
                    descripcionCasilla.focus();
                }
            }
        }

    }
    else{
        formulario.submit();
        alert("Pregunta creada correctamente.");
    }

}