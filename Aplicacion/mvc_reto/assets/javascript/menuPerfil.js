/*
Este fichero JavaScript controlará las acciones relacionadas con el menú desplegable del botón del perfil
del usuario. Este está situado en el header de las páginas principales.
 */

// DOMContentLoaded --> Se dispara cuando el HTML del documento ha sido completamente cargado y analizado por el navegador (sin esperar a los estilos, imágenes, etc.).
document.addEventListener("DOMContentLoaded", function(){

    const botonPerfil = document.getElementById("botonPerfil");
    const menuPerfil = document.getElementById("menuPerfil");
    const opcionGestionarCuenta = document.getElementById("opcionGestionarCuenta");

    // Ocultar la opción de "Gestionar cuentas" si no es administrador (será posible gracias a la variable que se le inyecta desde el 'footer.php').
    if (esAdmin === 0){
        opcionGestionarCuenta.style.display = "none";
    }
    else{
        opcionGestionarCuenta.style.display = "block";
    }

    // Mostrar / Ocultar el menú al hacer clic en el botón del perfil.
    botonPerfil.addEventListener("click", function(e){
        e.preventDefault(); // Evitar el comportamiento por defecto del enlace [navegar a la URL especificada].
        e.stopPropagation(); // Detener la propagación del clic para evitar que el siguiente evento (el del documento) lo capture.
        menuPerfil.style.display = (menuPerfil.style.display === "block") ? "none" : "block";
    });

    // Ocultar el menú si se hace clic fuera de él.
    document.addEventListener("click", function(e){
        // Verificar si el menú de perfil está visible, y si el clic no ocurrió dentro del botón de perfil o del menú.
        if (menuPerfil.style.display === "block" && !botonPerfil.contains(e.target) &&
            !menuPerfil.contains(e.target)){
            menuPerfil.style.display = "none";
        }
    });

});