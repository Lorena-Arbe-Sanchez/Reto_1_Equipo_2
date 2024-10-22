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

let registrar = document.getElementById("bRegistrar");
let modificar = document.getElementById("bModificar");

function validarRegistro() {

    let contador = 0;

    // Patrón para validar que solo tenga letras
    let expreg = new RegExp("^[a-zA-Z]+$");
    // Patrón para validar el número de teléfono (9 dígitos)
    let expreg1 = new RegExp("^[0-9]{9}$");
    // Patrón para validar la contraseña (mínimo una mayúscula, una minúscula y un número)
    let expreg2 = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d).{0,}$");

    if (!dni.value || !nombre.value || !primerApellido.value || !segundoApellido.value || !email.value || !telefono.value || !usuario.value || !contrasena.value || !repetirContrasena.value) {
        alert("No puede estar ningún campo vacío");
        
        contador +=1;

    }else{

        if (!expreg.test(nombre.value)) {
            alert("Solo puedes poner letras en el nombre");
            contador +=1;

        }
    
        if (!expreg.test(primerApellido.value)) {
            alert("Solo puedes poner letras en el primer apellido");
            contador +=1;

        }
    
        if (!expreg.test(segundoApellido.value)) {
            alert("Solo puedes poner letras en el segundo apellido");
            contador +=1;

        }
    
        if (!expreg1.test(telefono.value)) {
            alert("El teléfono debe tener exactamente 9 dígitos");
            contador +=1;

        }
    
        if (!expreg2.test(contrasena.value)) {
            alert("La contraseña debe contener al menos una mayúscula, una minúscula y un número");
            contador +=1;

        }
    
        if (contrasena.value !== repetirContrasena.value) {
            alert("Las contraseñas no coinciden");
            contador +=1;

        }
    }


    if(contador = 0){

        alert("Registro hecho")

    }
    
}

//Cuando escriba el DNI mirar si existe en caso de que exista sacar sus datos

registrar.addEventListener("click", validarRegistro);
