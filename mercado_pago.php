<?php

require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2842393127367236-031623-2f9b85b5d1e6fa4fcabc741eadbedb1d-163073193');

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Pago de Quinielas';
$item->quantity = 2;
$item->unit_price = 20;
$preference->items = array($item);
$preference->save();


?>

<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misael</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<body>
    <div class="card">
        <div class="card-header">
            <h1>Misael Lezma Mesino</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h1>Mis</h1>
                </div>
                <div class="col-md-4 justify-content-center">
                    <script src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
                    </script>
                </div>
                <div class="col-md-4">
                    <h1>ael</h1>
                </div>
            </div>
        </div>

    </div>
</body>

</html>