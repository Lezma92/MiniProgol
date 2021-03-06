<?php

require_once "../../controlador/resultados.controlador.php";
require_once "../../controlador/jornadas.controlador.php";

require_once "../../modelos/resultados.modelo.php";
require_once "../../modelos/jornadas.modelo.php";

require_once "../../modelos/plantillaParticipantes.php";

if (isset($_POST["idLiga"])) {
    $idLiga = $_POST["idLiga"];
    $idJornada = $_POST["idJornada"];

    $DatosJornadas = ControladorJornadas::ctrSelectNombreJornada($idJornada);
    $premios = ModeloResultados::mdlVerPremios($idJornada);
    $encuentros = ControladorResultados::crtListarEncuentros($idJornada);


    $pdf = new PDF();

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Cell(30);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(120, 10, utf8_decode($DatosJornadas["nombre"]), 0, 1, 'C');
    $pdf->Cell(30);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(120, 10, utf8_decode("Horarios de los próximos encuentros "), 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $cont_e = 1;
    $filaCambio = 65;
    $total_encuentros = 0;
    $num_vueltas = 0;
    foreach ($encuentros as $key => $listaEncuentros) {

        if ($cont_e == 3) {
            $pdf->Cell(58, 8, utf8_decode($listaEncuentros["eq_local"]) . " vs " . utf8_decode($listaEncuentros["eq_visi"]), 0, 0, 'C', 0);
            $pdf->Ln(4);
            $cont_e = 0;
            $pdf->SetFont('Arial', '', 11);
            $pdf->SetTextColor(251, 56, 14);
            for ($i = $num_vueltas; $i < ($num_vueltas + 3); $i++) {
                $pdf->SetFillColor(202, 207, 210);
                if ($encuentros[$i][8] == "C") {
                    $pdf->SetTextColor(247, 157, 49);
                    $pdf->SetFont('Arial', 'B', 11);
                    $pdf->Cell(58, 8, utf8_decode("Partido Cancelado"), 0, 0, 'C', 0);
                } elseif ($encuentros[$i][8] != "C" && $encuentros[$i][8] != "S/R") {
                    $pdf->SetTextColor(85, 186, 31);
                    $pdf->SetFont('Arial', 'B', 11);
                    $pdf->Cell(58, 8, utf8_decode("Partido Jugado"), 0, 0, 'C', 0);
                } else {
                    $pdf->SetTextColor(251, 56, 14);
                    $pdf->Cell(58, 8, utf8_decode($encuentros[$i][5]) . " " . utf8_decode($encuentros[$i][6]) . ", a las " . utf8_decode($encuentros[$i][7]), 0, 0, 'C', 0);
                }
            }
            $pdf->SetTextColor(19, 15, 14);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Ln(10);
            $num_vueltas += 3;

            $total_encuentros = $total_encuentros;
        } else {
            $pdf->Cell(58, 8, utf8_decode($listaEncuentros["eq_local"]) . " vs " . utf8_decode($listaEncuentros["eq_visi"]), 0, 0, 'C', 0);
        }
        $cont_e++;
        $total_encuentros++;
    }

    $pdf->Cell(30);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(120, 10, utf8_decode("Premios"), 0, 1, 'C');

    $cant_premios = sizeof($premios);
    foreach ($premios as $key => $premio) {
        if ($cant_premios  >= 2) {
            $pdf->Cell(50, 8, utf8_decode($premio["lugar"] . ": " . $premio["premio"]), 0, 0, 'C', 0);
        } else {
            $pdf->Cell(140, 8, utf8_decode($premio["lugar"] . ": " . $premio["premio"]), 0, 0, 'C', 0);
        }
    }
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(202, 207, 210);
    // $pdf->Cell(40, 8, utf8_decode("Participantes"), 1, 0, 'L', 1);
    // foreach ($encuentrosVS as $key => $value) {
    //     $pdf->Cell(40, 8, $pdf->TextWithDirection(110,50,'world!','L'), 1, 0, 'L', 1);
    // }
    $pdf->Cell(45, 8, utf8_decode("Participantes"), 1, 0, 'L', 1);
    $pdf->Cell(14, 8, 1, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 2, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 3, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 4, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 5, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 6, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 7, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 8, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, 9, 1, 0, 'C', 1);
    $pdf->Cell(14, 8, utf8_decode("P"), 1, 1, 'C', 1);
    $pdf->SetFont('Arial', '', 12);


    $resultados = ControladorResultados::ctrVerResultados($idLiga, $idJornada);
    $dat_aux = 0;
    $tb_resultados = [];
    $contN = 0;
    $contAux = 0;
    $contEncuentros = 0;
    foreach ($resultados as $key => $dat_result) {
        if ($dat_result["id_quiniela"] == $dat_aux) {
            if ($dat_result["colorColumna"] == "Verde") {
                $tb_resultados[$contAux][$contEncuentros] = "Verde";
                $tb_resultados[$contAux][$contEncuentros + 1] = $dat_result["voto_a"];
            } elseif ($dat_result["colorColumna"] == "Naranja") {
                $tb_resultados[$contAux][$contEncuentros] = "Naranja";
                $tb_resultados[$contAux][$contEncuentros + 1] = $dat_result["voto_a"];
            } else {
                $tb_resultados[$contAux][$contEncuentros] = "Blanco";
                $tb_resultados[$contAux][$contEncuentros + 1] = $dat_result["voto_a"];
            }

            $contEncuentros += 2;
        } else {
            if ($dat_result["colorColumna"] == "Verde") {
                $tb_resultados[$contN][1] = "Verde";
                $tb_resultados[$contN][2] = $dat_result["voto_a"];
            } elseif (($dat_result["colorColumna"] == "Naranja")) {
                $tb_resultados[$contN][1] = "Naranja";
                $tb_resultados[$contN][2] = $dat_result["voto_a"];
            } else {
                $tb_resultados[$contN][1] = "Blanco";
                $tb_resultados[$contN][2] = $dat_result["voto_a"];
            }
            $tb_resultados[$contN][0] = $dat_result["nombre_quiniela"];

            $tb_resultados[$contN][19] = $dat_result["totalPuntos"];
            $contAux = $contN;
            $contN++;
            $contEncuentros = 3;
        }
        $dat_aux = $dat_result["id_quiniela"];
    }
    $tam_tab =  sizeof($tb_resultados);


    for ($i = 0; $i < $tam_tab; $i++) {
        $tam_filas = sizeof($tb_resultados[$i]);
        for ($j = 0; $j < ($tam_filas); $j++) {
            if ($j == 0) {
                $pdf->Cell(45, 7, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'L');
            } else {
                if ($tb_resultados[$i][$j] == "Verde") {
                    $j += 1;
                    $pdf->SetFillColor(88, 214, 141);
                    $pdf->Cell(14, 7, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'C', 1);
                } elseif ($tb_resultados[$i][$j] == "Naranja") {
                    $j += 1;
                    $pdf->SetFillColor(247, 157, 49);
                    $pdf->Cell(14, 7, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'C', 1);
                } elseif ($tb_resultados[$i][$j] == "Blanco") {
                    $j += 1;
                    $pdf->Cell(14, 7, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'C');
                }
                if ($j == 19) {
                    $pdf->SetFont('Arial', 'B', 12);
                    $pdf->SetFillColor(14, 226, 236);
                    $pdf->Cell(14, 7, utf8_decode($tb_resultados[$i][19]), 1, 0, 'C', 1);
                }
                $pdf->SetFont('Arial', '', 12);
            }

            //                echo ($tb_resultados[$i][$j]);
        }
        $pdf->Ln();
    }


    $pdf->Output("Lista.pdf", "D");
}
