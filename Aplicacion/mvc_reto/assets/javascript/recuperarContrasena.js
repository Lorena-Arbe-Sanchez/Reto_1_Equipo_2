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
                // TODO : Habría que comprobar en la BD q el user existe y luego hacer update... MIRAR JS

                formulario.submit();
            }
        }
    }
}

// Parte para implementar los botones de 'visualizar contraseña'.

let contrasenaInput1 = document.getElementById("contrasena1");
let contrasenaInput2 = document.getElementById("contrasena2");
let botonVer1 = document.getElementById('toggle-password1');
let botonVer2 = document.getElementById('toggle-password2');
let iconoOjo1 = document.getElementById('icono_ojo1');
let iconoOjo2 = document.getElementById('icono_ojo2');

// Listeners para las casillas de la contraseña.
botonVer1.addEventListener('click', () => {
    cambiarElementos(contrasenaInput1,iconoOjo1);
});
botonVer2.addEventListener('click', () => {
    cambiarElementos(contrasenaInput2,iconoOjo2);
});

function cambiarElementos(contrasenaInput,iconoOjo){
    if (contrasenaInput.type === 'password'){
        iconoOjo.src = "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_noVer.png";
        contrasenaInput.type = 'text';
    }
    else{
        iconoOjo.src = "/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_ver.png";
        contrasenaInput.type = 'password';
    }
}