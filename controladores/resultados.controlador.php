<?php
class ControladorResultados
{
    static public function ctrVerLigasJornadas()
    {
        $respuesta = ModeloResultados::mdlMostrarLigarJornadas();

        return $respuesta;
    }
    static public function ctrVerResultados($id_liga,$id_jornada)
    {
        $respuesta = ModeloResultados::mdlMostrarResultados($id_liga,$id_jornada);

        return $respuesta;
    }
    static public function crtMostrarPremios($id_jornada){
        $respuesta = ModeloResultados::mdlVerPremios($id_jornada);
        return $respuesta;
    }
    static public function crtListarEncuentros($id_jornada){
        $respuesta = ModeloResultados::mdlgetEncuentros($id_jornada);
        return $respuesta;
    }
}