/* TODO : Poner comentarios en lo más complejo. */

// Listener para el cambio de modo claro-oscuro.
document.addEventListener('DOMContentLoaded', function(){

    const themeToggle = document.querySelector('.theme-toggle');
    const htmlElement = document.documentElement;

    // Para elementos del login.
    const superpuestaImage = document.querySelector('.superpuesta');

    // Para elementos del foro y demás.
    // TODO : Luego cambiar las 2 siguientes para que se apliquen a todas las págs.
    const menuToggle = document.querySelector('.pag_foro .menu-toggle');
    const botonesHeader = document.querySelector('.pag_foro .d_botonesHeader');
    const empresaImage = document.querySelector('.logo_empresa');
    const perfilImage = document.querySelector('.icono_perfil');

    let isDark = false;

    themeToggle.addEventListener('click', function(){
        htmlElement.classList.toggle('dark');
        isDark = !isDark;
        themeToggle.innerHTML = isDark ? '🌙' : '☀️';
        themeToggle.setAttribute('aria-label',
            isDark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro'
        );

        // Cambiar la imagen del logo de la empresa del login según el modo, si existe la imagen.
        if (superpuestaImage){
            superpuestaImage.src = isDark
                ? "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo_oscuro.png"
                : "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png";
        }

        // Cambiar la imagen del logo de la empresa del foro según el modo, si existe la imagen.
        if (empresaImage){
            empresaImage.src = isDark
                ? "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo_oscuro.png"
                : "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png";
        }

        // Cambiar la imagen del perfil del foro según el modo, si existe la imagen.
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
            superpuestaImage.src = "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo_oscuro.png";
        }
        themeToggle.setAttribute('aria-label', 'Cambiar a modo claro');
        isDark = true;
    }

    if (menuToggle && botonesHeader){
        menuToggle.addEventListener('click', function(){
            botonesHeader.classList.toggle('active');
        });
    }

});