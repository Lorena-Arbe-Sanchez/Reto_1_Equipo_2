/*
Este fichero JavaScript controlará las acciones relacionadas con el menú desplegable del botón del perfil
del usuario. Este está situado en el header de las páginas principales.
 */

// DOMContentLoaded --> Se dispara cuando el HTML del documento ha sido completamente cargado y analizado por el navegador (sin esperar a los estilos, imágenes, etc.).
document.addEventListener("DOMContentLoaded", function(){

    // Se buscará en la BBDD el valor de la columna "administrador" del usuario, para saber si es admin (1) o no (0).
    let esAdmin;

    // TODO : Descomentar cuando esté implementado.
    /*
    if (UserController -> usuarioEsAdmin() = 1)
        esAdmin = true;
    else
        esAdmin = false;
     */

    // TODO : De momento se pondrá como true.
    esAdmin = true;

    const botonPerfil = document.getElementById("botonPerfil");
    const menuPerfil = document.getElementById("menuPerfil");
    const opcionCrearCuenta = document.getElementById("opcionCrearCuenta");

    // Ocultar la opción de "Crear cuenta" si no es administrador.
    if (!esAdmin) {
        opcionCrearCuenta.style.display = "none";
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