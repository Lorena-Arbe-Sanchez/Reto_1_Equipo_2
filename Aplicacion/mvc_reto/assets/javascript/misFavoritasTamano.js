document.addEventListener("DOMContentLoaded", function(){
    const tablaRespuestas = document.querySelector(".pag_misFavoritas .tabla_respuestas");

    if (tablaRespuestas){
        let alturaTotalRespuestas = tablaRespuestas.offsetHeight;

        let nuevaAlturaContenido =  alturaTotalRespuestas * 1.5;

        document.documentElement.style.setProperty('--altura-contenido', nuevaAlturaContenido + 'px');
    }
    else{
        let nuevaAlturaContenido = 450;

        document.documentElement.style.setProperty('--altura-contenido', nuevaAlturaContenido + 'px');
    }
});