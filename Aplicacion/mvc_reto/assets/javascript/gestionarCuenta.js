/* TODO
* En la parte izquierda tendrá un listado de usuarios (cada uno con un botón de
* editar y eliminar) que se podrá filtrar (por algún dato).
* Arriba a la izquierda habrá un botón para crear un usuario nuevo.
*   Al clicar en crear, en la parte derecha se pondrá visible un contenedor con las
*       casillas que rellenar y el botón de "Registrar".
*   Al clicar en editar, se pondrán visibles las casillas que rellenar (y ya
*       rellenadas con los datos existentes) y el botón de "Modificar".
*   Al clicar en eliminar, aparecerá un mensaje de confirmación.
* */

let contador;

let botonCrear = document.getElementById("bCrear");
let botonEditar = document.getElementById("bEditar");
let formulario = document.getElementById("formRegistro");

// Si se selecciona el botón de crear o de editar --> se tendrá que mostrar el contenedor nº2.
botonCrear.addEventListener("click", mostrarContenedor2);
//botonEditar.addEventListener("click", mostrarContenedor2);

function mostrarContenedor2(e){
    let botonAccion = document.getElementById("bAccion");

    if (e.target.id === "bCrear")
        botonAccion.value = "Registrar";
    else{
        botonAccion.value = "Modificar";
        // TODO : Rellenar las casillas con los datos existentes.
    }

    botonAccion.addEventListener("click", (event) => validarDatos(event, e.target.id));

    // Volver visible el contenedor.
    document.getElementById("contenedor2").style.visibility = "visible";
}

function validarDatos(event, idBoton){

    event.preventDefault();

    contador = 0;

    let dniCasilla = document.getElementById("dni");
    let dni = dniCasilla.value;
    let administradorCasilla = document.querySelectorAll('input[name="admin"]');
    let adminSeleccionado = [...administradorCasilla].find(radio => radio.checked).value;
    let nombreCasilla = document.getElementById("nombre");
    let nombre = nombreCasilla.value;
    let primerApellidoCasilla = document.getElementById("primerApellido");
    let primerApellido = primerApellidoCasilla.value;
    let segundoApellidoCasilla = document.getElementById("segundoApellido");
    let segundoApellido = segundoApellidoCasilla.value;
    let emailCasilla = document.getElementById("email");
    let email = emailCasilla.value;
    let telefonoCasilla = document.getElementById("telefono");
    let telefono = telefonoCasilla.value;
    let usuarioCasilla = document.getElementById("usuario");
    let usuario = usuarioCasilla.value;
    let contrasenaCasilla = document.getElementById("contrasena");
    let contrasena = contrasenaCasilla.value;
    let repetirContrasenaCasilla = document.getElementById("repetirContrasena");
    let repetirContrasena = repetirContrasenaCasilla.value;

    // Patrón para validar el DNI.
    // TODO : Luego habrá que poner que tenga la operación matemática de lo de que sumando los números te calcula la letra...
    let expregDni = new RegExp("^[0-9]{8}[A-Z]$");
    // Patrón para validar que contenga un texto tal como un nombre.
    let expregTexto = new RegExp("^[A-Z][a-z]+( [A-Za-z]+)*$");
    // Patrón para validar el número de teléfono (9 dígitos empezando por un 6/7/8/9).
    let expregTel = new RegExp("^[6-9][0-9]{8}$");
    // Patrón para validar el email [se podría poner aún más completo/adaptable].
    let expregEmail = new RegExp("^[A-Za-z0-9]+(@gmail[.]com)$");
    // Patrón para validar la contraseña (mínimo 8 caracteres, entre ellos una mayúscula, una minúscula y un número).
    let expregContra = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)[A-Za-z\\d]{8,}$");

    if (!dni || !nombre || !primerApellido || !segundoApellido || !email || !telefono || !usuario || !contrasena || !repetirContrasena){
        alert("Todos los campos deben ser rellenados.");
        contador+=1;
    }
    else{

        if (!expregDni.test(dni)){
            alert("El DNI debe estar formado por 8 números y una letra en mayúsculas.");
            dniCasilla.focus();
            contador+=1;
        }
        else if (!expregTexto.test(nombre)){
            alert("El nombre debe estar formado por letras, empezar por mayúscula y tener mínimamente 2 caracteres.");
            nombreCasilla.focus();
            contador+=1;
        }
        else if (!expregTexto.test(primerApellido)){
            alert("El primer apellido debe tener el mismo formato que el nombre.");
            primerApellidoCasilla.focus();
            contador+=1;
        }
        else if (!expregTexto.test(segundoApellido)){
            alert("El segundo apellido debe tener el mismo formato que el primer apellido.");
            segundoApellidoCasilla.focus();
            contador+=1;
        }
        else if (!expregTel.test(telefono)){
            alert("El teléfono debe tener exáctamente 9 dígitos, empezando por '6' / '7' / '8' / '9'.");
            telefonoCasilla.focus();
            contador+=1;
        }
        else if (!expregContra.test(contrasena)){
            alert("La contraseña debe contener mínimamente 8 caracteres, entre ellos una mayúscula, una minúscula y un número.");
            contrasenaCasilla.focus();
            contador+=1;
        }
        else if (contrasena !== repetirContrasena){
            alert("Las contraseñas no coinciden");
            repetirContrasenaCasilla.focus();
            contador+=1;
        }

        // Si no hay errores (casillas vacías y/o patrones incorrectos), se creará o actualizará la cuenta.
        if(contador === 0){

            if (idBoton === "bCrear"){

                // TODO : Habría que hacer un 'insert' en la BBDD...

                crearUsuario();

                alert("Registro realizado correctamente.");
                //formulario.submit();

            }
            else{

                // TODO : Habría que hacer un 'update' en la BBDD...

                editarUsuario();

                alert("Modificación realizada correctamente.");

            }

        }

    }

}

/*
crearUsuario(): Debería enviar una petición al backend para registrar el nuevo usuario en la base de datos.
editarUsuario(): Debería enviar los cambios al servidor, haciendo una actualización (UPDATE) en la base de datos.
 */

function crearUsuario(){

}

function editarUsuario(){

}
