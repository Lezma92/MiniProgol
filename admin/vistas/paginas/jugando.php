<div class="contenerJugando">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-5">
                        <p class="font-weight-bold" style="font-size: 20px;">Listado de Jornada en Juego</p>
                    </div>
                    <div class="col-sm-5">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Inicio</a></li>
                            <li class="breadcrumb-item active">Jugando</li>
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

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-danger">
                                    <th>#</th>
                                    <th>Liga</th>
                                    <th>Jornada</th>
                                    <th>Cant. jugando</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $vistaJornadas = ControladorJornadas::ctrSelectJornadas("","Todas");
                                $fila = 1;
                                foreach ($vistaJornadas as $key => $value) {
                                    $cant_par = ControladorJornadas::crtCantParticipantes($value["id"]);
                                ?>
                                    <tr>
                                        <td><?php echo ($fila++); ?></td>
                                        <td><?php echo ($value["liga"]); ?></td>
                                        <td><?php echo ($value["nombre"]); ?></td>
                                        <td><?php echo ($cant_par["cantidad"]); ?></td>


                                        <td>

                                            <div class="btn-group">
                                                <button class="btn btn-info btn-lg font-weight-bold" onclick="verJugadores(<?php echo ($value["id"]); ?>)"><i class="far fa-eye"">Ver Jugadores</i></button>
                                        </div>

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