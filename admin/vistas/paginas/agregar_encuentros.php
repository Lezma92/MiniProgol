<?php
$id_jornada = $_GET["id_jornada"];
session_start();


$_SESSION["id_jornada"] = $id_jornada;
require_once "../../controlador/jornadas.controlador.php";
require_once "../../controlador/encuentros.controlador.php";
require_once "../../modelos/jornadas.modelo.php";
require_once "../../modelos/encuentros.modelo.php";
$jornada = ControladorJornadas::ctrSelectNombreJornada($id_jornada);
$opciones = ControladorEncuentros::crtStatsEncuentros($id_jornada);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Encuentros de la <?php echo ($jornada["nombre"]); ?></h1>
                </div>
                <div class="col-sm-6">
                <button type="button" onclick="cambiar_contenedores(<?php echo ($jornada["id_ligas"]); ?>);" class="btn btn-outline-info">Volver a jornadas</button>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a>Inicio</a></li>
                        <li class="breadcrumb-item active">Encuentros</li>
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
                    <div class="row">

                        <?php if ($opciones["stats_encuentros"] == "Captura") { ?>
                            <div class="col-sm-3 border-bottom-1">
                                <button type="button" onclick="setIdJornada(<?php echo ($id_jornada); ?>,'<?php echo ($opciones['stats_encuentros']); ?>');" class="btn btn-block bg-danger" data-toggle="modal" data-target="#modal_add_encuentros">Subir Encuentros</button>
                            </div>
                        <?php } elseif ($opciones["stats_encuentros"] == "Abierto") { ?>
                            <div class="col-sm-3 border-bottom-1">
                                <form method="post" action="paginas/imp_quinielas.php">
                                    <div class="">
                                        <input name="id_jornada" type="hidden" value="<?php echo ($jornada["id"]); ?>">
                                        <input name="titulo" type="hidden" value="<?php echo ($jornada["nombre"]); ?>">
                                        <button type="submit" class="btn btn-info btn-lg"><i class="fas fa-print"> Imprimir Quinielas</i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-3 border-bottom-1">
                                <button type="button" onclick="setIdJornadaPre(<?php echo ($id_jornada); ?>)" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_premios"><i class="fas fa-dollar-sign">Agregar Premio</i></button>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="card-body">

                    <div id="tabla_encuentros">
                        <?php
                        include("tabla_encuentros.php");
                        ?>
                    </div>
                    <?php if ($jornada["stats_encuentros"] == "Captura") { ?>
                        <div class="d-flex justify-content-center">
                            <button type="submit" onclick="guardarEncuentros(<?php echo ($jornada["id"]); ?>,'Abierto');" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Guardar
                                Encuentros</button>
                        </div>
                    <?php } ?>
                </div>




            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>
</div>
<?php if ($opciones["stats_encuentros"] == "Abierto") { include("modales/modal_add_premios.php"); }?>
<?php if ($opciones["stats_encuentros"] == "Captura") { include("modales/modal_add_encuentros.php"); }?>
<script src="js/opc_encuentros.js"></script>
<script src="js/busqueda_filtrada.js"></script>