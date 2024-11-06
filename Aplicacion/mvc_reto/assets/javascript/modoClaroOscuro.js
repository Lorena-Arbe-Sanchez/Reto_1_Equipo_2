/* TODO : Poner comentarios en lo más complejo. */

// Listener para el cambio de modo claro-oscuro.
document.addEventListener('DOMContentLoaded', function(){
    const themeToggle = document.querySelector('.theme-toggle');
    const htmlElement = document.documentElement;
    const superpuestaImage = document.querySelector('.superpuesta');
    let isDark = false;

    themeToggle.addEventListener('click', function(){
        htmlElement.classList.toggle('dark');
        isDark = !isDark;
        themeToggle.innerHTML = isDark ? '🌙' : '☀️';
        themeToggle.setAttribute('aria-label',
            isDark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro'
        );

        // Cambiar la imagen del logo de la empresa según el modo, si existe la imagen.
        if (superpuestaImage){
            superpuestaImage.src = isDark
                ? "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo_oscuro.png"
                : "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png";
        }

        // Guardar la preferencia del usuario en el 'localStorage' para que al actualizar la página no se cambie.
        localStorage.setItem('darkMode', isDark);
    });

    // Verificar y aplicar la preferencia guardada del usuario.
    if (localStorage.getItem('darkMode') === 'true'){
        htmlElement.classList.add('dark');
        themeToggle.innerHTML = '🌙';
        if (superpuestaImage) {
            superpuestaImage.src = "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo_oscuro.png";
        }
        themeToggle.setAttribute('aria-label', 'Cambiar a modo claro');
        isDark = true;
    }
});