<?php
$rutaImg = "https://lez.miniprogol.com/logos_equipos/ligasLogos/";
// $rutaImg="http://localhost/lezQuinielas/logos_equipos/ligasLogos/";
?>

<div class="text-info card">
    <div class="text-center" style="font-size: 20px;">
        <p class="font-weight-bold">Apuesta en las más grandes ligas</p>

    </div>
    <div class="row  text-center font-weight-bold" style="font-size: 16px;">
        <div class="col-sm-3 border">
            <img src="<?php echo ($rutaImg); ?>logo_mx.png" width="90px" height="83px" alt="Liga Premier">
            <p>Primera División de México</p>
        </div>

        <div class="col-sm-3 border">
            <img src="<?php echo ($rutaImg); ?>logo_premier.png" width="90px" height="83px" alt="Liga Premier">
            <p>Premier League</p>

        </div>

        <div class="col-sm-3 border">
            <img src="<?php echo ($rutaImg); ?>logo_eurocopa.png" width="90px" height="83px" alt="Liga Premier">
            <p>UEFA Europa League</p>

        </div>

        <div class="col-sm-3 border">
            <img src="<?php echo ($rutaImg); ?>logo_espa.png" width="70px" height="83px" alt="Liga Premier">
            <p>Primera División De España</p>
        </div>
    </div>
    <div class="text-center text-danger" style="font-size: 18px;">
        <span class="">Forma parte de la plataforma registrandote <a href="<?php echo($ruta);?>registrate" class="font-weight-bold">Aqui</a></span>
        <br>
        <span>o envia tu pronosticos <a href="https://miquiniela.miniprogol.com" class="font-weight-bold">Aqui</a></span>

    </div>
</div>

<?php
$Jornadas_ligas = ControladorResultados::ctrVerLigasJornadas();


foreach ($Jornadas_ligas as $key => $LigasJornada) {
    $premios = ControladorResultados::crtMostrarPremios($LigasJornada["idJornada"]);
    $encuentros = ControladorResultados::crtListarEncuentros($LigasJornada["idJornada"]);
?>

    <section class="content">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-warning card-outline">

                <div class="card-header">

                    <p class="text-primary text-center font-weight-bold" style="font-size: 20px;">
                        Tabla de posiciones y resultados <?php echo ($LigasJornada["nombreLiga"]); ?>
                    </p>
                    <p class="text-center font-weight-bold" style="font-size: 17px;">
                        <?php echo ($LigasJornada["nombreJornada"]); ?>
                    </p>

                </div>
                <?php if (isset($encuentros)) { ?>
                    <div class="text-center font-weight-bold">
                        <p>Encuentros de la jornada</p>
                    </div>
                    <div class="row">

                        <?php foreach ($encuentros as $key => $encuentro) { ?>
                            <div class="col-md-4">
                                <p class="text-dark mt-0 text-center font-weight-bold" style="font-size: 16px;">
                                    <?php echo ("<span class='text-dark'>" . ($key + 1) . ") ");

                                    echo ('<img height="34px" width="32px" src="' . $encuentro["img_local"] . '" alt="Card image cap"> </span>');
                                    echo ("  " . $encuentro["eq_local"] . "  VS  " . $encuentro["eq_visi"] . " ");
                                    echo ('<span><img height="34px" width="32px" src="' . $encuentro["img_visi"] . '" alt="Card image cap"> </span>');
                                    ?>
                                    <br>

                                    <?php
                                    if ($encuentro["resultado"] == "C") {
                                        echo ("<span class='font-weight-normal text-warning' style='font-size: 17px;'>" . "Partido cancelado" . "</span>");
                                    } elseif ($encuentro["resultado"] != "S/R" && $encuentro["resultado"] != "C") {
                                        echo ("<span class='font-weight-normal text-success' style='font-size: 17px;'>" . "Partido Jugado" . "</span>");
                                    } else {
                                        echo ("<span class='font-weight-normal text-info' style='font-size: 14px;'>" . $encuentro['dia_partido'] . $encuentro['dia_mes'] . " a las " . $encuentro['hora_partido'] . "</span>");
                                    }
                                    ?>
                                </p>

                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="card-body">
                    <?php if (isset($premios)) { ?>
                        <div class="text-center font-weight-bold">
                            <p>Lugares y Premios a ganar</p>
                        </div>
                        <div class="row">

                            <?php foreach ($premios as $key => $premio) { ?>
                                <div class="col-md">
                                    <p class="text-danger text-center font-weight-bold" style="font-size: 15px;">
                                        <?php echo ($premio["lugar"] . ": " . $premio["premio"]); ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="pad table-responsive">
                        <table id="example1" class="table table-bordered table-striped tablas">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Participantes</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>P</th>
                                </tr>
                            </thead>
                            <?php
                            $resultados = ControladorResultados::ctrVerResultados($LigasJornada["idLiga"], $LigasJornada["idJornada"]);
                            $dat_aux = 0;
                            $tb_resultados = [];
                            $contN = 0;
                            $contAux = 0;
                            $contEncuentros = 0;
                            foreach ($resultados as $key => $dat_result) {
                                if ($dat_result["id_quiniela"] == $dat_aux) {
                                    if ($dat_result["colorColumna"] == "Verde") {
                                        $tb_resultados[$contAux][$contEncuentros] = "<td class ='bg-success'>" . $dat_result["voto_a"] . "</td>";
                                    } elseif ($dat_result["colorColumna"] == "Naranja") {
                                        $tb_resultados[$contAux][$contEncuentros] = "<td class ='bg-warning'>" . $dat_result["voto_a"] . "</td>";
                                    } else {
                                        $tb_resultados[$contAux][$contEncuentros] = "<td>" . $dat_result["voto_a"] . "</td>";
                                    }

                                    $contEncuentros++;
                                } else {
                                    if ($dat_result["colorColumna"] == "Verde") {
                                        $tb_resultados[$contN][1] = "<td class = 'bg-success'>" . $dat_result["voto_a"] . "</td>";
                                    } elseif (($dat_result["colorColumna"] == "Naranja")) {
                                        $tb_resultados[$contN][1] = "<td class = 'bg-warning'>" . $dat_result["voto_a"] . "</td>";
                                    } else {
                                        $tb_resultados[$contN][1] = "<td>" . $dat_result["voto_a"] . "</td>";
                                    }
                                    $tb_resultados[$contN][0] = "<td>" . $dat_result["nombre_quiniela"] . "</td>";

                                    $tb_resultados[$contN][10] = "<td class = 'font-weight-bold bg-info'>" . $dat_result["totalPuntos"] . "</td>";
                                    $contAux = $contN;
                                    $contN++;
                                    $contEncuentros = 2;
                                }
                                $dat_aux = $dat_result["id_quiniela"];
                            }
                            $tam_tab =  sizeof($tb_resultados);
                            ?>

                            <tbody>
                                <?php
                                for ($i = 0; $i < $tam_tab; $i++) {
                                    $tam_filas = sizeof($tb_resultados[$i]);
                                    echo ("<tr class='text-center'>");
                                    for ($j = 0; $j < $tam_filas; $j++) {
                                        echo ($tb_resultados[$i][$j]);
                                    }
                                    echo ("</tr>");
                                }
                                ?>


                            </tbody>

                        </table>

                    </div>
                    <div class="card">
                        <div class="card-body text-center font-weight-bold">
                            <fieldset>
                                <legend>
                                    Simbología de tabla de resultados
                                </legend>
                                <span class="badge bg-success">
                                    <p>Partido Ganado</p>
                                </span>
                                <span class="badge bg-warning text-dark">
                                    <p>Partido Cancelado</p>
                                </span>
                                <span class="badge bg-light text-dark">
                                    <p>Sin Resultados</p>
                                </span>
                                <span class="badge bg-info text-dark">
                                    <p>Total de Puntos</p>
                                </span>
                            </fieldset>


                        </div>
                    </div>
                </div>

            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>

<?php } ?>
<script>
    $(function() {
        $(" #example1").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    });
</script>