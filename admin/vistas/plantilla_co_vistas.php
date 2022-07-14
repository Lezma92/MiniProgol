<?php

session_start();
$ruta = ControladorRutaa::ctrRuta();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<title>Principal</title>

	<base href="vistas/">

	<link rel="icon" href="img/icono.png">

	<!--=====================================
	VÍNCULOS CSS
	======================================-->

	<!-- Fuente Open Sans y Ubuntu -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">


	<!--=====================================
	VÍNCULOS CSS ADMIN LTE 3.0
	======================================-->
	  <link rel="stylesheet" href="css/estilo.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- iCheck -->
	  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/adminlte.min.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  <!-- DataTables -->
 	 <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">
	  <!-- SweetAlert2 -->
  	  <!-- <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css"> -->



	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->
	<!--=====================================
	VÍNCULOS JAVASCRIPT ADMIN LTE 3.0
	======================================-->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="plugins/chart.js/Chart.min.js"></script>
	<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
	<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>

	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">


<?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
  	   echo '<div class="wrapper">';
//===============================================================
if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 1000) {
    session_destroy();
    /* Aquí redireccionas a la url especifica */
    
    echo '<script>window.location = "http://miniprogol.com/login";</script>';
    die();  
}
$_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual

//============================================================ 

    // echo '<script>

    //           window.location = "http://192.168.0.23/hotel/login";


    // </script>';
	
include "paginas/header.php";
include "paginas/menu.php";



// include "paginas/cuerpo.php";

if(isset($_GET["pagina"])){

	if($_GET["pagina"] == "inicio" ||
		$_GET["pagina"] == "jornadas" ||
		$_GET["pagina"] == "jugando" ||
		$_GET["pagina"] == "ligas" ||
		$_GET["pagina"] == "solicitud" ||
		$_GET["pagina"] == "clientes" ||
		$_GET["pagina"] == "quinielas" ||
		$_GET["pagina"] == "imp_quinielas" ||
		$_GET["pagina"] == "cerrar" ||
	   $_GET["pagina"] == "usuarios"){

		include "paginas/".$_GET["pagina"].".php";

	}


   
	
}else{

	include "paginas/inicio.php";

}



include "paginas/footer.php";


 echo '</div>';
}else{

    //echo '<script>window.location = "quinielas/login";</script>';
    echo '<script>window.location = "miniprogol.com/login";</script>';

  }
?>

<script src="js/usuarios.js"></script>
<script src="js/opc_ligas.js"></script>

	
</body>
</html>