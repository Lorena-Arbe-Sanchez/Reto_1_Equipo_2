let usuario = document.getElementById("usuario");
let contrasena1 = document.getElementById("contrasena1");
let contrasena2 = document.getElementById("contrasena2");
let botonCambiar = document.getElementById("bCambiar");

botonCambiar.addEventListener("click",recuperarContrasena)


function recuperarContrasena(){

    let expreg = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d).{0,}$");

    if(!usuario.value){
        alert("El usuario esta vacio")
    }

    if(!contrasena1.value){

        alert("La contraseña no puede estar vacia")

    }else if(!contrasena2.value){

        alert("La repeticion de la contraseña no puede estar vacia");

    }else if(!expreg.test(contrasena1.value || !expreg.test(contrasena2.value))){

        alert("La contraseña no tiene un formato adecuado");

    }else if(contrasena1.value != contrasena2.value){

        alert("La contraseña no coincide con la contraseña repetida");

    }else{

        alert("Se ha cambiado la contraseña")

    }
}