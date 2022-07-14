<?php
class ControladorUsuarios
{


	static public function ctrlValidarUsuarios($item, $valor)
	{
		$tabla = "acceso";

		$res = ModeloUsuarios::mdlValidar($tabla, $item, $valor);

		return $res;
	}
	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario()
	{
		if (isset($_POST["ingUsuario"])) {

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "acceso";
				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
				if ($respuesta != "Sin datos") {
					if ($respuesta["usuario"] == $valor && $respuesta["pass_a"] == $encriptar) {

						if ($respuesta["estado"] == "Activo") {

							$_SESSION["iniciarSesion"] = "ok";
							$_SESSION["id"] = $respuesta["id"];
							$_SESSION["nombre"] = $respuesta["nombre"];
							$_SESSION["usuario"] = $respuesta["usuario"];
							$_SESSION["perfil"] = $respuesta["tipo_usuario"];

							/*=============================================
							REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
							=============================================*/

							date_default_timezone_set('America/Bogota');

							$fecha = date('Y-m-d');
							$hora = date('H:i:s');

							$fechaActual = $fecha . ' ' . $hora;

							$item1 = "ult_conexion";
							$valor1 = $fechaActual;

							$item2 = "id";
							$valor2 = $respuesta["id"];

							$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

							if ($ultimoLogin == "ok") {
								if ($respuesta["tipo_usuario"] == "Administrador" || $respuesta["tipo_usuario"] == "Soporte_ti") {

									// $rutaServidor = "http://localhost/lezQuinielas/admin/";
									$rutaServidor = "https://lez.miniprogol.com/admin/";
									echo '<script> window.location = "' . $rutaServidor . '";</script>';
								} elseif ($respuesta["tipo_usuario"] == "Cliente") {
									// $rutaServidor = "http://localhost/lezQuinielas/client/";
									$rutaServidor = "https://lez.miniprogol.com/client/";
									echo '<script> window.location = "' . $rutaServidor . '";</script>';
								} 
							}
						} else {

							echo '<br>
							 <div class="alert alert-danger">El usuario aún no está activado</div>';
						}
					} else {

						echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
					}
				} else {

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	static public function ctrCrearUsuario()
	{
		
		if (isset($_POST["input_nombre_user"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["input_nombre_user"])) {
				$tabla = "acceso";
				$pass = $_POST["input_pass_1"];
				$encriptar = crypt($pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datos = array(
					"nombre" => $_POST["input_nombre_user"],
					"apps" => $_POST["input_apps_user"],
					"tel" => $_POST["input_tel"],
					"usuario" => $_POST["input_user"],
					"password" => $encriptar,
					"tipo_usuario" => "Cliente",
					"estado" => "En Espera",
					"ult_conexion" => "0000-00-00 00:00:00"
				);

				$respuesta = ModeloUsuarios::mdlRegUsuario($tabla,$datos);

				return $respuesta;
			}
		}
	}
}
