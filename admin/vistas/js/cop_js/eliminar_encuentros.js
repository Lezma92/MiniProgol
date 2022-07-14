$(".tabla_encuentros").on("click", ".btn_eliminar_encuentro", function () {

  var id_encuentro = $(this).attr("id_encuentro");
  console.log("Estoy aqui ptm");
  var opc_encuentros = new FormData();
  opc_encuentros.append("accion", "EliminarEncuentros");
  opc_encuentros.append("id_encuentro", id_encuentro);

  Swal.fire({
    title: '¿Está seguro que desea eliminar el encuentro seleccionado?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/encuentros.ajax.php";
      let mensaje = "¡Encuentro eliminado correctamente!";
      let div_cambiar = "#tabla_encuentros";
      let url_cargar = "paginas/tabla_encuentros.php";
      cambiosAjax(url_pag, opc_encuentros, mensaje, div_cambiar, url_cargar);
    }
  })
})
function cambiarDatosPuntos(id_encuentro, eq_local, eq_visit, img_local, img_visitante) {
  $('#id_encuentro').val(id_encuentro);
  document.getElementById("img_local").src = "data:image/png;base64," + img_local;
  document.getElementById("img_visitante").src = "data:image/png;base64," + img_visitante;
  document.getElementById("equipo_local").innerHTML = eq_local;
  document.getElementById("equipo_visit").innerHTML = eq_visit;

}

function guardarPuntos() {

  var datos_puntos = new FormData($('#form_puntos')[0]);
  let mensaje = "Resultados registrados con exito!";
  let url_pag = "../ajax/encuentros.ajax.php";
  let div_cambiar = "#tabla_encuentros";
  let url_cargar = "paginas/tabla_encuentros.php";

  cambiosAjax(url_pag, datos_puntos, mensaje, div_cambiar, url_cargar);
  $('#modal_add_puntos').modal('toggle');
}

$(document).ready(function () {
 
  $("#encCancelado").on( 'change', function() {
      if( $(this).is(':checked') ) {
          // Hacer algo si el checkbox ha sido seleccionado
          $(this).val("Cancelar");
      } else {
          // Hacer algo si el checkbox ha sido deseleccionado
          $(this).val("Desactivo");
      }
  });
});