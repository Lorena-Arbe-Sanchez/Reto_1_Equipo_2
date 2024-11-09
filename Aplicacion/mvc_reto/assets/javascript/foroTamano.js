// Archivo para ajustar el diseño de la página del foro.

document.addEventListener("DOMContentLoaded", function(){
    // Seleccionar todas las preguntas.
    const preguntas = document.querySelectorAll(".pag_foro .pregunta");
    // Contar el número de preguntas.
    const questionCount = preguntas.length;

    const cuadrosRespuestas = document.querySelectorAll(".pag_foro .pregunta .respuestas");

    // Actualizar la variable CSS con el nuevo conteo.
    document.documentElement.style.setProperty('--question-count', questionCount);

    // Ajustar el margen superior dependiendo de la cantidad de preguntas.
    if (questionCount === 1){
        // Para 1 pregunta.
        document.documentElement.style.setProperty('--base-margin', '200px');
    }
    else if (questionCount === 2){
        // Para 2 preguntas.
        document.documentElement.style.setProperty('--base-margin', '150px');
    }
    else{
        // Para 3 o más preguntas
        document.documentElement.style.setProperty('--base-margin', '450px');
    }

    /*
    Ajustar la altura de los cuadros de respuestas.
    Para cada cuadro de respuestas, calcular la altura en función de la cantidad
    de respuestas dentro de ese cuadro, multiplicando una altura base de 175px
    por el número de respuestas y ajustando la propiedad CSS correspondiente.
     */

    let alturaCuadroRespuestas = 175;

    cuadrosRespuestas.forEach(cuadroRespuestas => {
        const respuestas = cuadroRespuestas.querySelectorAll(".respuesta");
        const respuestaCount = respuestas.length;

        cuadroRespuestas.style.setProperty('--altura-respuestas', alturaCuadroRespuestas * respuestaCount + 'px');
    });
});