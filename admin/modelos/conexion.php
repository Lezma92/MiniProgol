<?php

class Conexion
{

	static public function conectar()
	{
		$link = new PDO(
			"mysql:host=localhost;dbname=miniprog_lez",
			"miniprog",
			"PlJ0zI0m;k1V[0"
		);

		// $link = new PDO(
		// 	"mysql:host=localhost;dbname=miniprog_lez",
		// 	"root",
		// 	""
		// );

		$link->exec("set names utf8");

		return $link;
	}

}
