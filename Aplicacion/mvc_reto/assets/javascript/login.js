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

            // Habría que comprobar si existe en la BBDD.

            /*
            // Redirigir al usuario.
            usuarioExistente = header("Location: index.php?controller=usuario&action=validar");

            if (usuarioExistente === false || usuarioExistente === null){
                document.getElementById("mensajeErrorContrasena").innerText =
                    "No existe un usuario con esos datos.";
                document.getElementById("usuario").focus();
            }
            else{
                formulario.submit(); // Enviar el formulario manualmente.
            }
             */
        }
        else{
            document.getElementById("mensajeErrorContrasena").innerText = "La contraseña debe ser válida.";
            document.getElementById("contrasena").focus();
        }

    }
}