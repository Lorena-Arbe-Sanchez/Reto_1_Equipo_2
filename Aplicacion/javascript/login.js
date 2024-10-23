let botonIniciar = document.getElementById("bIniciar");
let formulario = document.getElementById("formLogin");

botonIniciar.addEventListener("click", (event) => validar(event));

function validar(event){

    // Evitar la recarga de la página y conservar el contenido de los campos si ocurre algún error.
    event.preventDefault();

    let usuario = document.getElementById("usuario").value;
    let contrasena = document.getElementById("contrasena").value;

    // Comprobar si alguna de las casillas está vacía.
    if (!usuario || !contrasena){

        if (!usuario && !contrasena) {
            alert("Las casillas del usuario y la contraseña deben ser rellenadas.");
            document.getElementById("usuario").focus();
        }

        else{
            if(!usuario) {
                alert("El usuario debe ser rellenado.");
                document.getElementById("usuario").focus();
            }
            else {
                alert("La contraseña debe ser rellenada.");
                document.getElementById("contrasena").focus();
            }
        }
    }
    else{

        // Validar la contraseña con su patrón.

        // TODO : ¿Tendrían que estar encriptadas, no?

        let expreg = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)[A-Za-z\\d]{8,}$");

        if(expreg.test(contrasena)){

            // TODO : Habría que comprobar en la BBDD q existe...

            alert("¡Bienvenido/a " +usuario+ "!");

            formulario.submit(); // Enviar el formulario manualmente

        }
        else{
            alert("La contraseña debe ser válida.");
        }

    }
}