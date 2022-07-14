<?php
require_once "conexion.php";

class ModeloJornadas
{
	/*=============================================
	REGISTRO DE LIGAS DE FUTBOL
	=============================================*/
	static public function mdlRegisLigas($tabla, $datos)
	{
		//INSERT INTO `ligas`(`id`, `nombre`, `fecha_registro`, `src_img`, `estado`)
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:nombre,CURDATE(),:img_src, :estado)");
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":img_src", $datos["imagen"], PDO::PARAM_LOB);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "Listo";
		} else {
			return "error";
		}
		$stmt->close();

		$stmt = null;
	}
	static public function mdlEliminar($tabla, $campo)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = $campo;");
		if ($stmt->execute()) {
			return "Listo";
		}
		$stmt->close();

		$stmt = null;
	}
	static public function mdlEstadoLiga($tabla, $campo, $estado)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE id = :id_liga");
		$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		$stmt->bindParam(":id_liga", $campo, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "Listo";
		}
		$stmt->close();

		$stmt = null;
	}
	static public function mdlDesacJornada($tabla, $campo, $estado)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado= :estado WHERE id = :id_jornada");
		$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
		$stmt->bindParam(":id_jornada", $campo, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "Listo";
		}
		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlRegisJornada($tabla, $datos)
	{


		//`id`, `nombre`, `app_s`, `usuario`, `pass_a`, `tipo_usuario`, `estado`, `ult_conexion`
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:id_liga,:nombre, :estado,:stats_encuentro,:fecha_hora_cierre)");
		$stmt->bindParam(":id_liga", $datos["id_liga"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":stats_encuentro", $datos["stats_encuentro"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_hora_cierre", $datos["fecha_hora_cierre"], PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();

		$stmt = null;
	}



	/*=============================================
	 EDITAR USUARIO
	 =============================================*/

	static public function mdlMostrarJornadas($tabla, $campo = "sin", $valor = "sin", $jornadas = "")
	{
		if ($jornadas == "Todas") {
			$conexion = Conexion::conectar()->prepare("SELECT j.id, j.id_ligas, j.nombre,
			(SELECT nombre FROM ligas WHERE	id = j.id_ligas) AS liga FROM jornadas AS j	WHERE j.estado = 'A'
			AND j.stats_encuentros = 'Abierto';");
			if ($conexion->execute()) {
				return $conexion->fetchAll();
			}
		} else {
			$conexion = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = $valor");
			if ($conexion->execute()) {
				return $conexion->fetchAll();
			}
		}
	}


	static public function mdlMostrarNombreJornada($tabla, $campo, $valor)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = $valor");
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}
	static public function mdlgetCantParticipantes($jornada)
	{
		$conexion  = Conexion::conectar()->prepare("select ifnull(count(id),0) as cantidad from quinielas where id_jornada = $jornada;");
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}
	static public function mdlListarJugadores($idJornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT 
		acc.id AS idAcceso, q.id AS idQuniela,q.id_ligas AS idLigas, j.id AS idJornada, j.nombre AS nomJornada,
		CONCAT(acc.nombre, ' ', app_s) AS nombreJugador, COUNT(q.id) totalQuinielas	FROM
		acceso AS acc INNER JOIN quinielas AS q ON q.id_acceso = acc.id INNER JOIN jornadas 
		AS j ON j.id = q.id_jornada WHERE j.id = :idJornada GROUP BY q.id_acceso order by totalQuinielas DESC;");

		$conexion -> bindParam("idJornada",$idJornada,PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}

	static public function mdlMostrarLigas($tabla, $estado)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado =:estado;");
		$conexion->bindParam(":estado", $estado, PDO::PARAM_STR);
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
	static public function mdlMostrarLiga($id_jornada)
	{
		//SELECT * FROM ligas AS lg INNER JOIN jornadas AS jor ON jor.id_ligas = lg.id WHERE jor.id = :id_jornada
		$conexion = Conexion::conectar()->prepare("SELECT * FROM ligas AS lg INNER JOIN jornadas AS jor ON jor.id_ligas = lg.id WHERE jor.id = :id_jornada;");
		$conexion->bindParam(":id_jornada", $id_jornada, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}
	static public function mdlDatosLigas($id_liga)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM ligas WHERE id = :id_ligas");
		$conexion->bindParam(":id_ligas", $id_liga, PDO::PARAM_INT);
		if ($conexion->execute()) {
			return $conexion->fetch();
		}
	}

	static public function mdlMostrarEquipos($tabla)
	{
		$conexion = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
}