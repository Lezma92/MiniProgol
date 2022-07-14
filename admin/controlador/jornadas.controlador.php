<?php
class ControladorJornadas
{
    static public function ctrCrearJornadas()
    {
        if (isset($_POST["input_nombre_jornada"])) {
            $id_liga = $_POST["id_liga"];
            $tabla = "jornadas";
            $datos = array(
                "id_liga" => $id_liga,
                "nombre" => $_POST["input_nombre_jornada"],
                "estado" => 'A',
                "stats_encuentro" => "Captura",
                "fecha_hora_cierre"=> $_POST["fecha_hora_cierre"]
            );
            $respuesta = ModeloJornadas::mdlRegisJornada($tabla, $datos);

            return $respuesta;
        }
    }

    static public function ctrCrearLigas()
    {
        if (isset($_POST["input_nombre_liga"])) {
            $tabla = "ligas";
            $archivo = $_FILES["imagen"]["tmp_name"];
            $file_principal = fopen($archivo, 'rb'); //leer el archivo como binario
            echo ($file_principal);
            $datos = array(
                "nombre" => $_POST["input_nombre_liga"],
                "imagen" => $file_principal,
                "estado" => 'Activo'
            );
            $respuesta = ModeloJornadas::mdlRegisLigas($tabla, $datos);


            return $respuesta;
        }
    }

    static public function ctrSelectJornadas($valor="",$ver="")
    {
        $tabla = "jornadas";
        if ($ver == "Todas" && $valor=="") {
            $respuesta = ModeloJornadas::mdlMostrarJornadas($tabla,"","","Todas");
            return $respuesta;
        }else{
            $campo = "id_ligas";
            $respuesta = ModeloJornadas::mdlMostrarJornadas($tabla, $campo, $valor);
            return $respuesta;
        }
        
       
    }

    static public function crtListarJugadores($id_jornada){
        $respuesta = ModeloJornadas::mdlListarJugadores($id_jornada);
        return $respuesta;

    }
    static public function crtCantParticipantes($id_jornada){
        $respuesta = ModeloJornadas::mdlgetCantParticipantes($id_jornada);
        return $respuesta;
    }
    static public function ctrSelectNombreJornada($valor)
    {
        $tabla = "jornadas";
        $campo = "id";
        $respuesta = ModeloJornadas::mdlMostrarNombreJornada($tabla, $campo, $valor);
        return $respuesta;
    }
    static public function ctrSelectLigas($estado)
    {
        $tabla = "ligas";
        $respuesta = ModeloJornadas::mdlMostrarLigas($tabla,$estado);
        return $respuesta;
    }
    static public function ctrVerLiga($id_jornada)
    {
        $respuesta = ModeloJornadas::mdlMostrarLiga($id_jornada);
        return $respuesta;
    }
    static public function ctrEliminarLigas()
    {
        $tabla = "ligas";
        $id_liga = $_POST["id_liga"];
        $respuesta = ModeloJornadas::mdlEliminar($tabla,$id_liga);
        return $respuesta;
    }
    static public function ctrEliminarJornada()
    {
        $tabla = "jornadas";
        $id_jornada = $_POST["id_jornada"];
        $respuesta = ModeloJornadas::mdlEliminar($tabla,$id_jornada);
        return $respuesta;
    }
    static public function ctrDesactivarLigas()
    {
        $tabla = "ligas";
        $id_liga = $_POST["id_liga"];
        $estado = $_POST["estado_liga"];
        $respuesta = ModeloJornadas::mdlEstadoLiga($tabla,$id_liga,$estado);
        return $respuesta;
    }
    static public function ctrDesactivarJornada()
    {
        $tabla = "jornadas";
        $id_jornada = $_POST["id_jornada"];
        $estado = $_POST["estado_jornada"];
        $respuesta = ModeloJornadas::mdlDesacJornada($tabla,$id_jornada,$estado);
        return $respuesta;
    }

    static public function ctrDatosLiga($id_liga)
    {
        $respuesta = ModeloJornadas::mdlDatosLigas($id_liga);
        return $respuesta;
    }


    static public function crtListarEquipos()
    {
        $tabla = "equipos";
        $respuesta = ModeloJornadas::mdlMostrarEquipos($tabla);

        return $respuesta;
    }
}
