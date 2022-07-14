$(document).ready(function () {
    $('#guardarPuntos').click(function () { 
       var datos_puntos = new FormData($('#form_puntos')[0]);
        let mensaje = "Ganador registrado con exito!";
        let url_pag = "../ajax/encuentros.ajax.php";
        let div_cambiar = "#tabla_encuentros";
        cambiosAjax(url_pag, datos_puntos, mensaje, div_cambiar, url_cargar);
    });
    
});