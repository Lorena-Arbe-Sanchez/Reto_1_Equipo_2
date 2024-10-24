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

let contador = 0;

let botonCrear = document.getElementById("bCrear");
let botonEditar = document.getElementById("bEditar");

// Si se selecciona el botón de crear o de editar --> se tendrá que mostrar el contenedor nº2.
botonCrear.addEventListener("click", mostrarContenedor2);
botonEditar.addEventListener("click", mostrarContenedor2);

function mostrarContenedor2(e){
    let botonAccion = document.getElementById("bAccion");

    if (e.target.id === "bCrear")
        botonAccion.value = "Registrar";
    else
        botonAccion.value = "Modificar";

    botonAccion.addEventListener("click", (event) => validarRegistro(event));

    // Volver visible el contenedor.
    document.getElementById("contenedor2").style.display = "flex";
}








function validarRegistro(event){

    event.preventDefault();

    let dniCasilla = document.getElementById("dni");
    let dni = dni.value;
    let administradorCasilla = document.getElementById("administrador");
    let administrador = administrador.value;
    let nombreCasilla = document.getElementById("nombre");
    let nombre = nombre.value;
    let primerApellidoCasilla = document.getElementById("primerApellido");
    let primerApellido = primerApellido.value;
    let segundoApellidoCasilla = document.getElementById("segundoApellido");
    let segundoApellido = segundoApellido.value;
    let emailCasilla = document.getElementById("email");
    let email = email.value;
    let telefonoCasilla = document.getElementById("telefono");
    let telefono = telefono.value;
    let usuarioCasilla = document.getElementById("usuario");
    let usuario = usuario.value;
    let contrasenaCasilla = document.getElementById("contrasena");
    let contrasena = contrasena.value;
    let repetirContrasenaCasilla = document.getElementById("repetirContrasena");
    let repetirContrasena = repetirContrasena.value;

    // Patrón para validar que contenga un texto tal como un nombre.
    let expregTexto = new RegExp("^[A-Z][a-z]+( [A-Za-z]+)*$");
    // Patrón para validar el número de teléfono (9 dígitos empezando por un 6/7/8/9).
    let expregTel = new RegExp("^[6-9][0-9]{8}$");
    // Patrón para validar el email [se podría poner aún más completo/adaptable].
    let expregEmail = new RegExp("^[A-Za-z0-9]+(@gmail[.]com)$");
    // Patrón para validar la contraseña (mínimo 8 caracteres, entre ellos una mayúscula, una minúscula y un número).
    let expregContra = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)[A-Za-z\\d]{8,}$");

    if (!dni.value || !nombre.value || !primerApellido.value || !segundoApellido.value || !email.value || !telefono.value || !usuario.value || !contrasena.value || !repetirContrasena.value){
        alert("Todos los campos deben ser rellenados.");
        contador+=1;
    }
    else{

        if (!expregTexto.test(nombre.value)){
            alert("El nombre debe estar formado por letras, empezar por mayúscula y tener mínimamente 2 caracteres.");
            nombreCasilla.focus();
            contador+=1;
        }
        else if (!expregTexto.test(primerApellido.value)){
            alert("El primer apellido debe tener el mismo formato que el nombre.");
            primerApellidoCasilla.focus();
            contador+=1;
        }
        else if (!expregTexto.test(segundoApellido.value)){
            alert("El segundo apellido debe tener el mismo formato que el primer apellido.");
            segundoApellidoCasilla.focus();
            contador+=1;
        }
        else if (!expregTel.test(telefono.value)){
            alert("El teléfono debe tener exáctamente 9 dígitos, empezando por '6' / '7' / '8' / '9'.");
            telefonoCasilla.focus();
            contador+=1;
        }
        else if (!expregContra.test(contrasena.value)){
            alert("La contraseña debe contener mínimamente 8 caracteres, entre ellos una mayúscula, una minúscula y un número.");
            contrasenaCasilla.focus();
            contador+=1;
        }
        else if (contrasena.value !== repetirContrasena.value){
            alert("Las contraseñas no coinciden");
            repetirContrasenaCasilla.focus();
            contador+=1;
        }
    }

    if(contador === 0){
        alert("Registro realizado correctamente.")
    }

}