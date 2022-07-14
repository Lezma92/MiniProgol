<?php
$id_jornada = $_GET["id_jornada"];
$idUsuario = $_GET["idUsuario"];
session_start();



$_SESSION["id_jornada"] = $id_jornada;

include("../../controlador/resultados.controlador.php");
include("../../modelos/resultados.modelo.php");

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jugares con quinielas registradas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a>Inicio</a></li>
                        <li class="breadcrumb-item active">Jugando</li>
                        <li class="breadcrumb-item">Lista Jugadores</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-danger card-outline">

                <div class="card-body pad table-responsive" id="tabla_jornada_activas">

                    <table id="example1" class="table table-bordered table-striped tablaHistorial">
                        <thead>
                            <tr class="text-danger">
                                <th>#</th>
                                <th>Quiniela</th>
                                <th>Juego</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vistaQuinielas = ControladorResultados::ctrVerMisQuinielas($idUsuario,$id_jornada);

                            foreach ($vistaQuinielas as $key => $value) {
                                $combinacion = ControladorResultados::crtVerJuego($value["idQuinielas"]);
                            ?>
                                <tr>
                                    <td><?php echo ($key + 1); ?></td>
                                    <td><?php echo ($value["nomQuiniela"]); ?></td>
                                    <td><?php echo ($combinacion["jugada"]); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" idLi ="<?php echo($value['idLigas']); ?>" idUsu = "<?php echo($value['idAcceso']);?>" idQ = "<?php echo($value['idQuinielas']);?>" idJ = "<?php echo($value['idJornada']);?>" class="btn btn-danger btn-lg font-weight-bold eliminarQuiniela"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>


                    </table>




                </div>

            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>
    
</div>
<script src=" js/verJugando.js"></script>
<script>
    $(function() {
        $(" #example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>