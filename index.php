<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/resultados.controlador.php";
require_once "modelos/resultados.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
