document.addEventListener("DOMContentLoaded", function() {
    let filtrar = document.getElementById("filtrarLink");

    if (filtrar){
        // Agrega el evento "click" al enlace
        filtrar.addEventListener("click", enviarTema);
    }

    function enviarTema(event) {
        // Evita el comportamiento predeterminado del enlace
        event.preventDefault();

        // Obtiene el valor seleccionado del <select>
        let temaSeleccionado = document.getElementById('tema').value;

        // Verifica que se haya elegido una opción válida
        if (temaSeleccionado !== "Seleccionar opción") {
            // Redirige a la URL con el parámetro GET
            window.location.href = `index.php?controller=pregunta&action=filtrarPorTema&tema=${temaSeleccionado}`;
        } else {
            alert("Por favor, selecciona una opción válida.");
        }

        /*
            alert(temaSeleccionado)
            // Redirige a la URL con el parámetro GET
            if (temaSeleccionado !== "Seleccionar opción") { // verifica que se haya elegido una opción válida
                window.location.href = `index.php?controller=pregunta&action=filtrarPorTema&tema=${temaSeleccionado}`;
            }
        */
    }

});