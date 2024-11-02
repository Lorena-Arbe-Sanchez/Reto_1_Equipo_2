let bAnadirImg = document.getElementById('anadirImg');
let inputArchivo = document.getElementById('inputFile');

bAnadirImg.addEventListener('click', function(){
    inputArchivo.click();
});

inputArchivo.addEventListener('change', function(event){

    // TODO : Mirar como estaba en el ej de clase, y si eso cambiar/quitar... (¿obtener el enlace del archivo seleccionado, hacer un update en la BD y recargar la pág?)

    const file = event.target.files[0];
    if (file) {
        console.log('Imagen seleccionada:', file.name);
        // añadir código para manejar la imagen seleccionada...
    }
});