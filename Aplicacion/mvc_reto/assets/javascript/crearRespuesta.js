let crearRespuesta = document.getElementById("bCrearRespuesta");
let formulario = document.getElementById("formCrearRespuesta");

crearRespuesta.addEventListener("click", (event) => validarCreacion(event));

function validarCreacion(event){

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

document.getElementById("anadirImg").addEventListener("click", function() {
    // Activa el input de archivo cuando se haga clic en el botón
    document.getElementById("inputFile").click();
});

// Cuando un archivo es seleccionado, mostrar el nombre del archivo
document.getElementById("inputFile").addEventListener("change", function(event) {
    var fileName = event.target.files[0] ? event.target.files[0].name : "No se ha seleccionado ningún archivo";
    document.getElementById("fileNameDisplay").textContent = "Archivo seleccionado: " + fileName;
});
