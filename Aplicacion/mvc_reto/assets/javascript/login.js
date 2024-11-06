let botonIniciar = document.getElementById("bIniciar");
let formulario = document.getElementById("formLogin");

botonIniciar.addEventListener("click", (event) => validar(event));

function validar(event){

    // Evitar la recarga de la página y conservar el contenido de los campos si ocurre algún error.
    event.preventDefault();

    document.getElementById("mensajeErrorUsuario").innerText = "";
    document.getElementById("mensajeErrorContrasena").innerText = "";

    let usuario = document.getElementById("usuario").value;
    let contrasena = document.getElementById("contrasena").value;

    // Comprobar si alguna de las casillas está vacía.
    if (!usuario || !contrasena){

        if (!usuario && !contrasena){
            document.getElementById("mensajeErrorContrasena").innerText =
                "Las casillas del usuario y la contraseña deben ser rellenadas.";
            document.getElementById("usuario").focus();
        }
        else{
            if(!usuario){
                document.getElementById("mensajeErrorUsuario").innerText = "El usuario debe ser rellenado.";
                document.getElementById("usuario").focus();
            }
            if(!contrasena){
                document.getElementById("mensajeErrorContrasena").innerText =
                    "La contraseña debe ser rellenada.";
                document.getElementById("contrasena").focus();
            }
        }
    }
    else{

        // Validar la contraseña con su patrón.

        let expreg = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)[A-Za-z\\d]{8,}$");

        if(expreg.test(contrasena)){
            formulario.submit();
        }
        else{
            document.getElementById("mensajeErrorContrasena").innerText = "La contraseña debe ser válida.";
            document.getElementById("contrasena").focus();
        }

    }
}

// TODO : Lo siguiente hay que reutilizarlo en todas las ventanas.
// TODO : Poner que se guarde en 'localStorage' o algo así (para que no se cambie).

// Para el cambio de modo claro-oscuro.
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.querySelector('.theme-toggle');
    const htmlElement = document.documentElement;
    let isDark = false;

    themeToggle.addEventListener('click', function() {
        htmlElement.classList.toggle('dark');
        isDark = !isDark;
        themeToggle.innerHTML = isDark ? '🌙' : '☀️';
        themeToggle.setAttribute('aria-label',
            isDark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro'
        );

        // Guardar la preferencia del usuario
        localStorage.setItem('darkMode', isDark);
    });

    // Verificar y aplicar la preferencia guardada del usuario
    if (localStorage.getItem('darkMode') === 'true') {
        htmlElement.classList.add('dark');
        themeToggle.innerHTML = '🌙';
        themeToggle.setAttribute('aria-label', 'Cambiar a modo claro');
        isDark = true;
    }
});