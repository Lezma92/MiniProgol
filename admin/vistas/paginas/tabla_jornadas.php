<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cant. de Participantes</th>
            <th>Visible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "../../controlador/jornadas.controlador.php";
        require_once "../../modelos/jornadas.modelo.php";
        if (!isset($_SESSION["id_liga"])) {
            session_start();
        }
        $vistaJornadas = ControladorJornadas::ctrSelectJornadas($_SESSION["id_liga"]);
        $fila = 1;
        foreach ($vistaJornadas as $key => $value) {
            $cant_par = ControladorJornadas::crtCantParticipantes($value["id"]);
        ?>
            <tr>
                <td><?php echo ($fila++); ?></td>
                <td><?php echo ($value["nombre"]); ?></td>
                <td><?php echo ($cant_par["cantidad"]); ?></td>
                <td>

                    <?php if ($value["estado"] != "D") { ?>
                        <button class="btn btn-success btn-xs btnActivar" onclick="desactivarJornada(<?php echo ($value["id"]); ?>,'<?php echo ($value["nombre"]); ?>','D');">Activado</button>
                    <?php } else { ?>
                        <button class="btn btn-danger btn-xs btnActivar" onclick="desactivarJornada(<?php echo ($value["id"]); ?>,'<?php echo ($value["nombre"]); ?>','A');">Desactivado</button>
                    <?php } ?>
                </td>

                <td>

                    <div class="btn-group">
                        <?php
                        $texto = "Ver Encuentros";
                        $logo = "far fa-eye";
                        $tipo_btn = "btn btn-info";

                        if ($value["stats_encuentros"] == "Captura") {
                            $texto = "Agregar encuentros";
                            $logo = "fas fa-edit";
                            $tipo_btn = "btn btn-warning";
                        } ?>
                        <button class="<?php echo ($tipo_btn); ?> font-weight-bold" onclick="contenedor_encuentros(<?php echo ($value["id"]); ?>)" data-toggle="modal" data-target="#"><i class="<?php echo ($logo); ?>"><?php echo ($texto); ?></i>
                        </button>
                        <?php if ($value["stats_encuentros"] == "Abierto") { ?>
                            <form method="post" action="paginas/reporte_participantes.php">
                                <input name="idLiga" value="<?php echo($_SESSION["id_liga"])?>" type="hidden">
                                <input name="idJornada" value="<?php echo ($value["id"]); ?>" type="hidden">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                            </form>
                        <?php } ?>
                        <?php if ($value["stats_encuentros"] == "Captura") { ?>
                            <button class="btn btn-danger" onclick="eliminarJornada(<?php echo ($value["id"]); ?>,'<?php echo ($value["nombre"]); ?>')"><i class="fas fa-trash-alt"></i>
                            </button>
                        <?php } //else{ 
                        ?>
                        <!-- <button class="btn btn-info"><i class="far fa-eye">Participantes</i>
                            </button>  -->
                        <?php //} 
                        ?>

                    </div>

                </td>
            </tr>
        <?php } ?>


    </tbody>

    
</table>