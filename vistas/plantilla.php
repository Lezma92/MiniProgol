<?php

$ruta = ControladorRuta::ctrRuta();
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MINIPROGOL</title>

    <base href="vistas/">

    <link rel="icon" href="img/icono.png">

    <!--=====================================
	VÍNCULOS CSS
	======================================-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Fuente Open Sans y Ubuntu -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="css/plugins/bootstrap-datepicker.standalone.min.css">

    <!-- jdSlider -->
    <link rel="stylesheet" href="css/plugins/jquery.jdSlider.css">
    

    <!-- Hoja de estilo personalizada -->

    <link rel="stylesheet" href="css/plugins/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="../admin/vistas/dist/css/adminlte.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- DataTables -->
    <script src="../admin/vistas/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../admin/vistas/plugins/datatables/dataTables.bootstrap4.js"></script>
    <link rel="stylesheet" href="css/plugins/dataTables.bootstrap4.css">
    


</head>

<body class="login-page">

    <?php

    include "paginas/modulos/menu.php";

    /*=============================================
PÁGINAS 
=============================================*/



    if (isset($_GET["pagina"])) {
        // if ($_GET["pagina"] == "ejemplo") {
        // 			// $pagina = explode("/",$_GET["pagina"]);

        // 			// include "paginas/".$pagina.".php";

        // 			include "paginas/" . $_GET["pagina"] . ".php";
        // 			include "paginas/modulos/footer.php";
        // 		} else 
        if ($_GET["pagina"] == "login") {
            if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {


                if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Soporte_ti") {
                    // echo '<script>window.location = "http://localhost/lezQuinielas/admin/";</script>';
                    echo '<script>window.location = "https://lez.miniprogol.com/admin/";</script>';
                }
                if ($_SESSION["perfil"] == "Cliente") {
                    // echo '<script>window.location = "http://localhost/lezQuinielas/client/";</script>';
                    echo '<script>window.location = "https://lez.miniprogol.com/client/";</script>';

                }
            } else {
                include "paginas/login.php";
            }
        } elseif ($_GET["pagina"] == "registrate") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } elseif ($_GET["pagina"] == "regquiniela") {
            include "paginas/" . $_GET["pagina"] . ".php";
        } else {
            include "paginas/404.php";
        }
    } else {

        include "paginas/inicio.php";
        include "paginas/modulos/footer.php";
    }

    ?>


</body>

</html>
<!-- DataTables -->
<script src="../admin/vistas/plugins/datatables/jquery.dataTables.js"></script>
<script src="../admin/vistas/plugins/datatables/dataTables.bootstrap4.js"></script>