<?php 

require_once "../controlador/jornadas.controlador.php";
require_once "../modelos/jornadas.modelo.php";


class AjaxJornada{

	public function RegistrarJornadas(){

	  $respuesta = ControladorJornadas::ctrCrearJornadas();	
      echo json_encode($respuesta);

	}
	public function RegistrarLigas(){

		$respuesta = ControladorJornadas::ctrCrearLigas();	
		echo json_encode($respuesta);
  
	  }
	  public function EliminarLigas(){

		$respuesta = ControladorJornadas::ctrEliminarLigas();	
		echo json_encode($respuesta);
  
	  }
	  public function EliminarJornada(){

		$respuesta = ControladorJornadas::ctrEliminarJornada();	
		echo json_encode($respuesta);
  
	  }
	  public function DesactivarLiga(){
		$respuesta = ControladorJornadas::ctrDesactivarLigas();	
		echo json_encode($respuesta);
	  }
	  public function DesactivarJornada(){
		  $respuesta = ControladorJornadas::ctrDesactivarJornada();
		  echo(json_encode($respuesta));
	  }

	  public function verEquipos(){
		  $respuesta = ControladorJornadas::crtListarEquipos();
		  echo json_encode($respuesta);
	  }

}
//REGISTRAR JORNADA
if(isset($_POST["input_nombre_jornada"]) && isset($_POST["id_liga"])){
	$registro = new AjaxJornada();
	$registro -> RegistrarJornadas();

}
//REGISTRAR LIGAS DE FUTBOL
if(isset($_POST["input_nombre_liga"])){
	$registro = new AjaxJornada();
	$registro -> RegistrarLigas();
}


if(isset($_POST["ver_equipos"])){
	$registro = new AjaxJornada();
	$registro -> verEquipos();
}
if(isset($_POST["EliminarLiga"])){
	$registro = new AjaxJornada();
	$registro -> EliminarLigas();
}
if(isset($_POST["EliminarJornada"])){
	$registro = new AjaxJornada();
	$registro -> EliminarJornada();
}
if(isset($_POST["Desactivar"])){
	$registro = new AjaxJornada();
	$registro -> DesactivarLiga();
}
if(isset($_POST["cambiarEstadoJornada"])){
	$registro = new AjaxJornada();
	$registro -> DesactivarJornada();
}



