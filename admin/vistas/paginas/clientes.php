<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Configuracion y administracion de clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a>Inicio</a></li>
            <li class="breadcrumb-item">Clientes</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!------------------------------------------------------------------------------------->
      <div class="card card-warning card-outline">
        <div class="card-header">
          <div class="col-sm-2">
            <button type="button" onclick="estoyEnModal('cliente')" class="btn btn-block" id="color_ofi" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
          </div>
        </div>


        <div class="card-body pad table-responsive">
          <table id="example1" class="table table-bordered table-striped tablas">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Ultima Conexión</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php



              $usuarios = ControladorUsuarios2::ctrlMostrarUsuarios("tipo_usuario", "Cliente", "Activos");

              foreach ($usuarios as $key => $value) {

                echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["nombre"] . ' ' . $value["app_s"] . '</td>
                          <td>' . $value["usuario"] . '</td>';


                echo '<td>' . $value["tel"] . '</td>';

                if ($value["estado"] != "Inactivo") {

                  echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="Inactivo">Activado</button></td>';
                } else {

                  echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="Activo">Desactivado</button></td>';
                }

                echo '<td>' . $value["ult_conexion"] . '</td>
                          <td>

                            <div class="btn-group">
                                 
                              <button class="btn btn-warning btnEditarUsuario" onclick="estoyEnModalEditar(2)" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>

                              <button class="btn btn-danger btnEliminarUsuario" estoyEn = "2"  idUsuario="' . $value["id"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

                            </div>  

                          </td>

                        </tr>';
              }


              ?>

            </tbody>

          </table>

        </div>
      </div>
      <!-- ------------------------------------------------------------------------------- -->
    </div>
  </section>
</div>

<?php

include "modales/modal_usuarios.php";
include "modales/modal.php";
?>

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