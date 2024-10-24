/* TODO
* En la parte izquierda tendrá un listado de usuarios (cada uno con un botón de
* editar y eliminar) que se podrá filtrar (por algún dato).
* Arriba a la izquierda habrá un botón para crear un usuario nuevo.
*   Al clicar en crear, en la parte derecha se pondrá visible un contenedor con las
*       casillas que rellenar y el botón de registrar.
*   Al clicar en editar, se pondrán visibles las casillas que rellenar (y ya
*       rellenadas con los datos existentes) y el botón de modificar.
*   Al clicar en eliminar, aparecerá un mensaje de confirmación.
* */

let dni = document.getElementById("dni");
let administrador = document.getElementById("administrador");
let nombre = document.getElementById("nombre");
let primerApellido = document.getElementById("primerApellido");
let segundoApellido = document.getElementById("segundoApellido");
let email = document.getElementById("email");
let telefono = document.getElementById("telefono");
let usuario = document.getElementById("usuario");
let contrasena = document.getElementById("contrasena");
let repetirContrasena = document.getElementById("repetirContrasena");

let botonRegistrar = document.getElementById("bAccion");

let contador = 0;

botonRegistrar.addEventListener("click", (event) => validarRegistro(event));

function validarRegistro(event){

    event.preventDefault();

    // Patrón para validar que contenga un texto tal como un nombre.
    let expregTexto = new RegExp("^[A-Z][a-z]+( [A-Za-z]+)*$");
    // Patrón para validar el número de teléfono (9 dígitos empezando por un 6/7/8/9).
    let expregTel = new RegExp("^[6-9][0-9]{8}$");
    // Patrón para validar el email [se podría poner aún más completo/adaptable].
    let expregEmail = new RegExp("^[A-Za-z0-9]+(@gmail[.]com)$");
    // Patrón para validar la contraseña (mínimo 8 caracteres, entre ellos una mayúscula, una minúscula y un número).
    let expregContra = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)[A-Za-z\\d]{8,}$");

    if (!dni.value || !nombre.value || !primerApellido.value || !segundoApellido.value || !email.value || !telefono.value || !usuario.value || !contrasena.value || !repetirContrasena.value){
        alert("No puede estar ningún campo vacío.");
        contador+=1;
    }
    else{

        if (!expregTexto.test(nombre.value)){
            alert("El nombre debe estar formado por letras, empezar por mayúscula y tener mínimamente 2 caracteres.");
            contador+=1;
        }
        if (!expregTexto.test(primerApellido.value)){
            alert("Solo puedes poner letras en el primer apellido");
            contador+=1;
        }
        if (!expregTexto.test(segundoApellido.value)){
            alert("Solo puedes poner letras en el segundo apellido");
            contador+=1;
        }
        if (!expregTel.test(telefono.value)){
            alert("El teléfono debe tener exactamente 9 dígitos");
            contador+=1;
        }
        if (!expregContra.test(contrasena.value)){
            alert("La contraseña debe contener al menos una mayúscula, una minúscula y un número");
            contador+=1;
        }
        if (contrasena.value !== repetirContrasena.value){
            alert("Las contraseñas no coinciden");
            contador+=1;

        }
    }

    if(contador === 0){
        alert("Registro realizado correctamente.")
    }

}