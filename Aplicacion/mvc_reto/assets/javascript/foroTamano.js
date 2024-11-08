document.addEventListener("DOMContentLoaded", function(){
    const preguntas = document.querySelectorAll(".pag_foro .pregunta"); // Selecciona todas las preguntas
    const questionCount = preguntas.length; // Cuenta el número de preguntas

    const cuadrosRespuestas = document.querySelectorAll(".pag_foro .pregunta .respuestas");

    // Actualiza la variable CSS con el nuevo conteo
    document.documentElement.style.setProperty('--question-count', questionCount);

    // Ajusta el margen superior dependiendo del número de preguntas
    if (questionCount === 1){
        document.documentElement.style.setProperty('--base-margin', '200px'); // Para 1 pregunta
    }
    else if (questionCount === 2){
        document.documentElement.style.setProperty('--base-margin', '150px'); // Para 2 preguntas
    }
    else {
        document.documentElement.style.setProperty('--base-margin', '450px'); // Para 3 o más preguntas
    }

    let alturaCuadroRespuestas = 175;

    cuadrosRespuestas.forEach(cuadroRespuestas => {
        const respuestas = cuadroRespuestas.querySelectorAll(".respuesta");
        const respuestaCount = respuestas.length;

        cuadroRespuestas.style.setProperty('--altura-respuestas', alturaCuadroRespuestas * respuestaCount + 'px');
    });
});