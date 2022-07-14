<?php
class ControladorQuinielas 
{   
    static public function crtEliminarQuiniela(){
        $id_quiniela = $_POST["id_quiniela"];
        $id_liga = $_POST["id_liga"];
        $id_jornada = $_POST["id_jornada"];

        $respuesta = ModeloQuinielas::mdlEliminarPuntos($id_quiniela);
        if ($respuesta =="Listo") {
            $datos = array(
                'id_jornada' => $id_jornada,
                'id_liga' => $id_liga,
                'id_quiniela' => $id_quiniela
            );
            $nvaRespuesta = ModeloQuinielas::mdlEliminarQuiniela($datos);
            return $nvaRespuesta;
        }
    }
    
}


?>