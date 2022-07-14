<?php
require_once "conexion.php";

class ModeloQuinielas
{

    static public function mdlEliminarQuiniela($datos)
    {
        $conexion = Conexion::conectar()->prepare("DELETE FROM quinielas WHERE id_jornada = :id_jornada and id_ligas = :id_liga and id =:id_quiniela;");
        $conexion->bindParam("id_jornada", $datos["id_jornada"], PDO::PARAM_INT);
        $conexion->bindParam("id_liga", $datos["id_liga"], PDO::PARAM_INT);
        $conexion->bindParam("id_quiniela", $datos["id_quiniela"], PDO::PARAM_INT);

        if ($conexion->execute()) {
            return "Listo";
        }
    }

    static public function mdlEliminarPuntos($id_quiniela)
    {
        $conexion = Conexion::conectar()->prepare("DELETE FROM `puntos` WHERE id_quiniela = :id_quiniela;");
        $conexion->bindParam("id_quiniela", $id_quiniela, PDO::PARAM_INT);
        if ($conexion->execute()) {
            return "Listo";
        }

    }
}
