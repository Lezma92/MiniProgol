<?php
require_once "conexion.php";

class ModeloResultados
{
	static public function mdlMostrarLigarJornadas()
	{
		$conexion = Conexion::conectar()->prepare("SELECT jor.id AS idJornada, lg.id AS idLiga,
		lg.nombre as nombreLiga, jor.nombre as nombreJornada FROM jornadas AS jor
		INNER JOIN ligas AS lg ON jor.id_ligas = lg.id WHERE jor.estado = 'A'
		AND jor.stats_encuentros = 'Abierto';");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
	static public function mdlVerPremios($id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT * FROM premios WHERE id_jornada = $id_jornada;");
		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}
	static public function mdlMostrarResultados($id_liga, $id_jornada)
	{
		$conexion = Conexion::conectar()->prepare("SELECT 
		qui.id AS id_quiniela,qui.nombre_quiniela, pt.voto_a, enc.resultado,
		IF(pt.voto_a = enc.resultado,'Verde', IF(enc.resultado = 'C', 'Naranja',
		'Blanco')) AS colorColumna, ifnull((SELECT COUNT(q.id) AS puntos FROM quinielas AS q INNER JOIN
		puntos AS p ON q.id = p.id_quiniela INNER JOIN encuentros AS e ON e.resultado = p.voto_a
		AND e.id = p.id_encuentro WHERE q.id = qui.id GROUP BY p.id_quiniela),0) totalPuntos
		FROM quinielas AS qui INNER JOIN puntos AS pt ON qui.id = pt.id_quiniela LEFT JOIN 
		encuentros AS enc ON enc.id = pt.id_encuentro WHERE qui.id_ligas = :ID_LIGAS AND qui.id_jornada = :ID_JORNADA 
		GROUP BY qui.id , pt.id
	ORDER BY totalPuntos DESC , qui.id , enc.id ASC");
		$conexion->bindParam("ID_LIGAS", $id_liga, PDO::PARAM_INT);
		$conexion->bindParam("ID_JORNADA", $id_jornada, PDO::PARAM_INT);

		if ($conexion->execute()) {
			return $conexion->fetchAll();
		}
	}

}