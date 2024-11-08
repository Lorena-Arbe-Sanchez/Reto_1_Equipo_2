let filtrar = document.getElementById("filtrarLink");

function enviarTema() {
    // Obtiene el valor seleccionado del <select>
    let temaSeleccionado = document.getElementById('tema').value;

    alert(temaSeleccionado)
    // Redirige a la URL con el parámetro GET
    if (temaSeleccionado !== "Seleccionar opción") { // verifica que se haya elegido una opción válida
        window.location.href = `index.php?controller=pregunta&action=filtrarPorTema&tema=${temaSeleccionado}`;
    }
}

// Agrega el evento "click" al enlace
filtrar.addEventListener("click", enviarTema);
