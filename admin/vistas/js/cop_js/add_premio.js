$(".form_premios").on("change", "input.premio_1", function () {
    $(this).parent().parent().parent().children(".premios").html(

        '<div class="form-group col-md">' +
        '<input type="number" id="premio1" name ="premio1" class="form-control"  placeholder="1er Lugar" required>' +
        '</div>');
})

$(".form_premios").on("change", "input.premio_2", function () {
    $(this).parent().parent().parent().children(".premios").html(

        '<div class="form-group col-md">' +
        '<input type="number" id="premio1" name ="premio1" class="form-control"  placeholder="1er Lugar" required>' +
        '</div>' +
        '<div class="form-group col-md">' +
        '<input type="number" id="premio2" name ="premio2" class="form-control"  placeholder="2do Lugar" required>' +
        '</div>');
})
$(".form_premios").on("change", "input.premio_3", function () {
    $(this).parent().parent().parent().children(".premios").html(

        '<div class="form-group col-md">' +
        '<input type="number" id="premio1" name ="premio1" class="form-control"  placeholder="1er Lugar" required>' +
        '</div>' +
        '<div class="form-group col-md">' +
        '<input type="number" id="premio2" name ="premio2" class="form-control"  placeholder="2do Lugar" required>' +
        '</div>' +
        '<div class="form-group col-md">' +
        '<input type="number" id="premio3" name ="premio3" class="form-control"  placeholder="3er Lugar" required>' +
        '</div>');
})
function guardarPremios() {

    var datos_puntos = new FormData($('#form_premios')[0]);
    let mensaje = "Resultados registrados con exito!";
    let url_pag = "../ajax/encuentros.ajax.php";
    let div_cambiar = "#tabla_encuentros";
    let url_cargar = "paginas/tabla_encuentros.php";

    cambiosAjax(url_pag, datos_puntos, mensaje, div_cambiar, url_cargar);
    $('#modal_premios').modal('toggle');
}

    //Se encarga de procesar la informacion de los promios





// -----------------------------------------------------------------------

