
<?php
$id_jornada = $_GET["id_jornada"];
$id_liga = $_GET["id_liga"];
session_start();
if (isset($_SESSION["id"])) {
    $id_usuario = $_SESSION["id"];
}

include("../../controlador/quinielas.controlador.php");
include("../../modelos/quinielas.modelo.php");

// SDK de Mercado Pago/vendor/autoload.php
require __DIR__ .  '../../../../vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2842393127367236-031623-2f9b85b5d1e6fa4fcabc741eadbedb1d-163073193');

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
 $preference->save();

$datos = ControladorQuinielas::crtMsotrarQuinielas($id_jornada);

?>
<script src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
data-preference-id="163073193-9684b557-e146-40cc-ae54-0fed827d5be7">
</script>



<script src="js/quinielas.js"></script>