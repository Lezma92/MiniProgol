<?php
require_once "conexion.php";

class ModeloUsuarios
{
	/*=============================================
	OBTENER VENDEDORES
	=============================================*/
	static public function mdlMostrarVendedores($tabla, $item, $valor)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();
	}


	/*=============================================
	OBTENER USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios2($tabla, $item, $valor, $estado)
	{

		if ($item != null) {
			if ($estado == "Activos") {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado <> 'En Espera'");

				$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

				$stmt->execute();

				return $stmt->fetchAll();
			}
			if ($estado == "Espera") {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 'En Espera'");
				$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

				$stmt->execute();

				return $stmt->fetchAll();
			}
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	static public function mdlValidar($tabla, $item, $valor)
	{



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();
	}


	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario2($tabla, $item1, $valor1, $item2, $valor2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos)
	{

		//`(`, `nombre`, `app_s`, `tel`, `usuario`, `pass_a`, `tipo_usuario`, `estado`, `ult_conexion`)
		//`id`, `nombre`, `app_s`, `usuario`, `pass_a`, `tipo_usuario`, `estado`, `ult_conexion`
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (null,:nombre, :apps,:tel, :usuario, :password, :tipo_usuario, :estado,:ult_conexion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apps", $datos["apps"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_usuario", $datos["tipo_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":ult_conexion", $datos["ult_conexion"], PDO::PARAM_STR);

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

	static public function mdlEditarUsuario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombreEditado,app_s = :appEditado,tel = :tel,usuario=:usuEditado,pass_a = :passEditado ,tipo_usuario = :tipusuEditado  WHERE id = :idUsuario;");

		$stmt->bindParam(":idUsuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreEditado", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":appEditado", $datos["apps"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":usuEditado", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":passEditado", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":tipusuEditado", $datos["tipo_usuario"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	REPETIR  USUARIO
	=============================================*/
	static public function mdlValidarUser($item, $valor, $id)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item AND id != :id");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	static public function mdlEliminarUsuario($tabla, $id)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
