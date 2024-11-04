let crearRespuesta = document.getElementById("bCrearRespuesta");
let formulario = document.getElementById("formCrearRespuesta");

crearRespuesta.addEventListener("click", (event) => validarCreacion(event));

function validarCreacion(event) {

    event.preventDefault();

    let enunciadoCasilla = document.getElementById("solucion");
    let enunciado = enunciadoCasilla.value;

    // Comprobar si alguna de las casillas está vacía / sin seleccionar.
    if (!enunciado){
        alert('La solución debe estar escrita.');
        enunciadoCasilla.focus();
    }

    else{
        formulario.submit();
        alert("Respuesta creada correctamente.");
    }

}