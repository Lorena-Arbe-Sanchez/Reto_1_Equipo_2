let botonCambiar = document.getElementById("bCambiar");
let formulario = document.getElementById("formRecuperarContra");

botonCambiar.addEventListener("click", (event) => recuperarContrasena(event));

function recuperarContrasena(event){

    event.preventDefault();

    let usuario = document.getElementById("usuario").value;
    let contrasena1 = document.getElementById("contrasena1").value;
    let contrasena2 = document.getElementById("contrasena2").value;

    // Comprobar si alguna de las casillas está vacía.
    if (!usuario || !contrasena1 || !contrasena2){

        if (!usuario && !contrasena1 && !contrasena2){
            alert("Todas las casillas deben ser rellenadas.");
            document.getElementById("usuario").focus();
        }
        else{
            if(!usuario){
                alert("El usuario debe ser rellenado.");
                document.getElementById("usuario").focus();
            }
            if(!contrasena1){
                alert("La primera contraseña debe ser rellenada.");
                document.getElementById("contrasena1").focus();
            }
            else{
                alert("La segunda contraseña debe ser rellenada.");
                document.getElementById("contrasena2").focus();
            }
        }
    }
    else {

        // Validar las contraseña con su patrón.

        let expreg = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)[A-Za-z\\d]{8,}$");

        if (!expreg.test(contrasena1) && !expreg.test(contrasena2)){
            alert("Ambas contraseñas deben ser válidas.");
            document.getElementById("contrasena1").focus();
        } else {
            if (!expreg.test(contrasena1)){
                alert("La primera contraseña debe ser válida.");
                document.getElementById("contrasena1").focus();
            }
            if (!expreg.test(contrasena2)){
                alert("La segunda contraseña debe ser válida.");
                document.getElementById("contrasena2").focus();
            }
            else if (contrasena1 !== contrasena2){
                alert("Las contraseñas deben ser iguales.");
                document.getElementById("contrasena2").focus();
            }
            else{
                // TODO : Habría que comprobar en la BBDD q el user existe y luego hacer update...

                alert("¡Bienvenido/a " +usuario+ "!");

                formulario.submit(); // Enviar el formulario manualmente
            }
        }
    }
}