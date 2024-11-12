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

// TODO : Reutilizar código (hacer funciones).

let contador;

let botonCrear = document.getElementById("bCrear");
//let botonEditar = document.getElementById("bEditar");
let formulario = document.getElementById("formRegistro");

// Si se selecciona el botón de crear o de editar --> se tendrá que mostrar el contenedor nº2.
botonCrear.addEventListener("click", mostrarContenedor2);
//botonEditar.addEventListener("click", mostrarContenedor2);

function mostrarContenedor2(e){
    let botonAccion = document.getElementById("bCrear");

    botonAccion.addEventListener("click", (event) => validarDatos(event, e.target.id));

    // Volver visible el contenedor.
    document.getElementById("contenedor2").style.visibility = "visible";
}

function validarDatos(event, idBoton){

    event.preventDefault();

    contador = 0;

    let dniCasilla = document.getElementById("dni");
    let dni = dniCasilla.value;
    console.log(dni); // TODO : Luego quitarlos.
    //let administradorCasilla = document.querySelectorAll('input[name="admin"]');
    //let adminSeleccionado = [...administradorCasilla].find(radio => radio.checked).value;
    let nombreCasilla = document.getElementById("nombre");
    let nombre = nombreCasilla.value;
    console.log(nombre)

    let primerApellidoCasilla = document.getElementById("primerApellido");
    let primerApellido = primerApellidoCasilla.value;
    console.log(primerApellido)

    let segundoApellidoCasilla = document.getElementById("segundoApellido");
    let segundoApellido = segundoApellidoCasilla.value;
    console.log(segundoApellido)

    let emailCasilla = document.getElementById("email");
    let email = emailCasilla.value;
    console.log(email)

    let telefonoCasilla = document.getElementById("telefono");
    let telefono = telefonoCasilla.value;
    console.log(telefono)

    let usuarioCasilla = document.getElementById("usuario");
    let usuario = usuarioCasilla.value;
    console.log(usuario)

    let contrasenaCasilla = document.getElementById("contrasena");
    let contrasena = contrasenaCasilla.value;
    console.log(contrasena)

    let repetirContrasenaCasilla = document.getElementById("repetirContrasena");
    let repetirContrasena = repetirContrasenaCasilla.value;
    console.log(repetirContrasena)


    // Patrón para validar el DNI.
    let expregDni = new RegExp("^[0-9]{8}[A-Z]$");
    // Patrón para validar que contenga un texto tal como un nombre con posibles tildes.
    let expregTexto = new RegExp("^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+( [A-Za-zÁÉÍÓÚÑáéíóúñ]+)*$");
    // Patrón para validar el número de teléfono (9 dígitos empezando por un 6/7/8/9).
    let expregTel = new RegExp("^[6-9][0-9]{8}$");
    // Patrón para validar el email. [Empieza con uno o más caracteres, seguido de un @, luego una secuencia de letras minúsculas, y termina con .com]
    let expregEmail = new RegExp("^.+([@][a-z]+[.]com)$");
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
        else{
            // Extraer los números y la letra del DNI.
            let numeroDNI = parseInt(dni.slice(0, 8), 10);
            let letraDNI = dni.charAt(8);
            let letraCalculada = calcularLetraDni(numeroDNI);

            if (letraDNI !== letraCalculada){
                alert("La letra del DNI no es correcta.");
                dniCasilla.focus();
                contador += 1;
            }
        }
        if (!expregTexto.test(nombre)){
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
        else if (!expregEmail.test(email)){
            alert("El email debe terminar por '@aergibide.com'.");
            emailCasilla.focus();
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
            formulario.submit();
        }

    }

}

function calcularLetraDni(numero){
    const letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    return letras[numero % 23];
}