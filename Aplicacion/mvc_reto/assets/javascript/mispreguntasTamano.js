document.addEventListener("DOMContentLoaded", function(){
    const tablaPreguntas = document.querySelector(".pag_misPreguntas .tabla_cuentas");
    const tablaRespuestas = document.querySelector(".pag_misPreguntas .tabla_respuestas");

    if (tablaPreguntas && tablaRespuestas){
        let alturaTotalPreguntas = tablaPreguntas.offsetHeight;
        let alturaTotalRespuestas = tablaRespuestas.offsetHeight;

        let nuevaAlturaContenido = alturaTotalPreguntas + alturaTotalRespuestas;

        document.documentElement.style.setProperty('--altura-contenido', nuevaAlturaContenido + 'px');
    }
});