// Acciones relacionadas con el cambio de modo claro-oscuro y también para el menú de las ventanas en el header.

/*
'DOMContentLoaded' --> Se dispara cuando el HTML del documento ha sido completamente
cargado y analizado por el navegador (sin esperar a los estilos, imágenes, etc.).
 */
document.addEventListener('DOMContentLoaded', function(){

    const htmlElement = document.documentElement;

    // Botón para alternar entre modo claro y oscuro que está en todas las páginas.
    const themeToggle = document.querySelector('.theme-toggle');

    // Imagen de la página del login.
    const superpuestaImage = document.querySelector('.superpuesta');

    // Elementos del foro y demás páginas similares.
    const empresaImage = document.querySelector('.logo_empresa');
    const menuToggle = document.querySelector('.menu-toggle');
    const botonesHeader = document.querySelector('.d_botonesHeader');
    const perfilImage = document.querySelector('.icono_perfil');

    // Variable para controlar el estado del modo (claro/oscuro).
    let isDark = false;

    // Listener para controlar el botón del modo claro-oscuro.
    themeToggle.addEventListener('click', function(){
        // Cambia la clase 'dark' en el elemento <html> para alternar los estilos.
        htmlElement.classList.toggle('dark');
        // Actualizar el estado de 'isDark'.
        isDark = !isDark;
        // Cambiar el icono.
        themeToggle.innerHTML = isDark ? '🌙' : '☀️';
        // Cambiar el texto de accesibilidad del botón según el modo.
        themeToggle.setAttribute('aria-label',
            isDark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro'
        );

        // Cambiar la imagen del logo de la empresa del login según el modo, si existe la imagen.
        if (superpuestaImage){
            superpuestaImage.src = isDark
                ? "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_oscuro.png"
                : "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa.png";
        }

        // Cambiar la imagen del logo de la empresa del foro según el modo, si existe la imagen.
        if (empresaImage){
            empresaImage.src = isDark
                ? "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_oscuro.png"
                : "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa.png";
        }

        // Cambiar la imagen del perfil de las páginas principales según el modo, si existe la imagen.
        if (perfilImage){
            perfilImage.src = isDark
                ? "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil_oscuro.png"
                : "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil.png";
        }

        // Guardar la preferencia del usuario en el 'localStorage' para que al actualizar la página no se cambie.
        localStorage.setItem('darkMode', isDark);
    });

    // Verificar y aplicar la preferencia guardada del usuario.
    if (localStorage.getItem('darkMode') === 'true'){
        htmlElement.classList.add('dark');
        themeToggle.innerHTML = '🌙';
        if (superpuestaImage){
            superpuestaImage.src = "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_oscuro.png";
        }
        themeToggle.setAttribute('aria-label', 'Cambiar a modo claro');
        isDark = true;
    }

    /*
    Si existen el icono del menú y los botones del header, habrá que especificar
    que cuando se clique en el menú aparezcan las posibles ventanas a las que navegar.
     */
    if (menuToggle && botonesHeader){
        menuToggle.addEventListener('click', function(){
            // Activar o desactivar la clase 'active'.
            botonesHeader.classList.toggle('active');
        });
    }

});