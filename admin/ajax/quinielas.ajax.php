<?php

require_once "../controlador/quinielas.controlador.php";
require_once "../modelos/quinielas.modelo.php";


class AjaxQuinielas
{

    public function eliminarQuiniela()
    {
        $respuesta = ControladorQuinielas::crtEliminarQuiniela();

        echo (json_encode($respuesta));
    }
}
//REGISTRAR Encuentro
if (isset($_POST["eliminarQuiniela"]) && isset($_POST["id_quiniela"])  && isset($_POST["id_liga"])) {
    $registro = new AjaxQuinielas();
    $registro->eliminarQuiniela();
} else {
    echo (json_encode("SinDatos"));
}
