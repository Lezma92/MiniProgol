  <?php
    session_start();


    $id_liga = $_GET["id_liga"];
    $_SESSION["id_liga"] = $id_liga;
    require_once "../../controlador/jornadas.controlador.php";
    require_once "../../modelos/jornadas.modelo.php";
    $vista = ControladorJornadas::ctrDatosLiga($id_liga);


    ?>

  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-2">
                      <img height="100px" width="100px"
                          src="data:image/png;base64, <?php echo (base64_encode($vista["src_img"])); ?>"
                          alt="Card image cap">
                  </div>
                  <div class="col-sm-5">
                      <h1>Jornadas de <?php echo ($vista["nombre"]); ?></h1>
                  </div>
                  <div class="col-sm-5">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a>Inicio</a></li>
                          <li class="breadcrumb-item active">Jornadas</li>
                      </ol>
                  </div>
              </div>
          </div>
      </section>

      <section class="content">
          <div class="container-fluid">
              <!------------------------------------------------------------------------------------->
              <div class="card card-primary card-outline">

                  <div class="card-header">

                      <div class="col-sm-2 border-bottom-1">
                          <button type="button" onclick="cambiarDatosModalJornada(<?php echo ($id_liga); ?>)"
                              class="btn btn-block" id="color_ofi" data-toggle="modal"
                              data-target="#modalJornadas">Nueva Jornada</button>
                      </div>


                  </div>

                  <div class="card-body pad table-responsive" id="tabla_jornadas">

                      <?php
                        include("tabla_jornadas.php");
                        ?>
                  </div>

              </div>
              <!-- ------------------------------------------------------------------------------- -->
          </div>
      </section>
  </div>

  <?php

    include "modales/modal_addJornadas.php";
    ?>
  <script src="js/add_jornadas.js"></script>
  <script src="js/opc_encuentros.js"></script>
  <script>
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    });
</script>