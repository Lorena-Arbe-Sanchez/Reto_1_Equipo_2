let bAnadirImg = document.getElementById('anadirImg');
let inputArchivo = document.getElementById('inputFile');
let formulario = document.getElementById('formCambiarImg');

bAnadirImg.addEventListener('click', function(){
    inputArchivo.click();
});

inputArchivo.addEventListener('change', function(){
    // Enviar el formulario automáticamente al seleccionar un archivo.
    formulario.submit();
});