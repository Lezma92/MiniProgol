
$(document).ready(function () {
  console.log("leyyendo");

  $('#guardar_jornadas').click(function () {
    nombre_jornada = $('#input_nombre_jornada').val();
    // fecha_hora_ini = $('#fecha_ini').val();
    fecha_hora_cierre = $('#fecha_cierre').val();
    fecha_hora_cierre = fecha_hora_cierre.replace("T", " ");
    // console.log(fecha_hora_ini);
    console.log(fecha_hora_cierre);
    id_liga = $('#id_liga').val();

    var datos = new FormData();
    datos.append("input_nombre_jornada", nombre_jornada);
    datos.append("id_liga", id_liga);
    datos.append("fecha_hora_cierre", fecha_hora_cierre);

    if (nombre_jornada != "" && nombre_jornada != " " && nombre_jornada != null && fecha_hora_cierre != "" && fecha_hora_cierre != null) {
      $.ajax({
        url: "../ajax/jornadas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
          console.log(res);
          if (res == '"ok"') {
            Swal.fire({

              type: "success",
              icon: 'success',
              title: "¡La Jornada se ha guardado correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function (result) {
              if (result.value) {
                $("#tabla_jornadas").load("paginas/tabla_jornadas.php");
              }
            });

          } else if (res == "1062") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href>Why do I have this issue?</a>'
            })

          }
        }
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No es posible registrar una jornada vacia!'
      })
    }



  });
});

function desactivarJornada(id_jornada, jornada, estado) {
  tiMensaje = '¿Está seguro que desea desactivar ' + jornada + '?';
  if (estado == "A") {
    tiMensaje = '¿Está seguro que desea Activar ' + jornada + '?';
  }
  Swal.fire({
    title: tiMensaje,
    text: "¡al aceptar no será posible reactivarla!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/jornadas.ajax.php";
      let mensaje = "¡Status de liga cambiado correctamente!";
      let desactivar = new FormData();
      desactivar.append("cambiarEstadoJornada", "Yess");
      desactivar.append("id_jornada", id_jornada);
      desactivar.append("estado_jornada", estado);
      let div_cambiar = "#tabla_jornadas";
      let url_cargar = "paginas/tabla_jornadas.php";
      //LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar)
      JornadaaAjax(url_pag, desactivar, mensaje, div_cambiar, "Div", url_cargar);
    }
  })
}
function eliminarJornada(id_jornada, jornada) {

  Swal.fire({
    title: "¿Está seguro que desea eliminar la " + jornada + "?",
    text: "¡al aceptar se eliminará permanentemente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/jornadas.ajax.php";
      let mensaje = "¡Status de liga cambiado correctamente!";
      let desactivar = new FormData();
      desactivar.append("EliminarJornada", "Yess");
      desactivar.append("id_jornada", id_jornada);
      let div_cambiar = "#tabla_jornadas";
      let url_cargar = "paginas/tabla_jornadas.php";
      //LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar)
      JornadaaAjax(url_pag, desactivar, mensaje, div_cambiar, "Div", url_cargar);
    }
  })
}

function JornadaaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar) {
  $.ajax({
    url: url_pag,
    dataType: "json",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {

      console.log(res);
      if (res == 'Listo') {
        Swal.fire({
          type: "success",
          icon: 'success',
          title: mensaje,
          showConfirmButton: true,
          confirmButtonText: "Cerrar"

        }).then(function (result) {
          if (result.value) {
            if (cambio == "Div") {
              $(div_cambiar).load(url_cargar);
            } if (cambio == "pagina") {
              window.location = url_cargar;
            }

          }
        });

      } else if (res == "1062") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
          footer: '<a href>Why do I have this issue?</a>'
        })

      }
    }
  });

}