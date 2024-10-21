let usuario = document.getElementById("usuario");
let contrasena = document.getElementById("contrasena");
let botonIniciar = document.getElementById("bIniciar");

botonIniciar.addEventListener("click",validar)

function validar(){

    if(!usuario.value){

        alert("El usuario no puede estar vacio");

    }

    if(!contrasena.value){

        alert("La contraseña no puede estar vacia");


    }else{


        let expreg = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d).{0,}$");

        if(expreg.test(contrasena.value)){

            alert("Bienvenido " + usuario.value);

            
        }else{

            alert("La contraseña no es valida");

        }

    }
}


