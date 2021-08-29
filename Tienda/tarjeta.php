<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro estético Carla María Villar Cuadrado - Tramitar pago</title>
    <?php include 'librerias.php' ?>
    <link rel="stylesheet" type="text/css" href="css/tarjeta.css">
</head>
<?php session_start(); ?>

<body>
    <div id="form-container">
        <div id="card-front">
            <div id="shadow"></div>
            <div id="image-container">
                <span id="amount">Importe a pagar:
                    <strong>
                        <?php
                        echo round($_SESSION["precio_final"], 2) . "€" ?>
                    </strong>
                </span>
                <span id="card-image">
                    <img src="images/svg/chip.svg" alt="Chip" width="60" height="30">
                </span>
            </div>
            <label for="card-number">
                Número de la tarjeta
            </label>
            <input type="text" id="card-number" placeholder="1234 5678 9101 1112" length="16">
            <div id="cardholder-container">
                <label for="card-holder">Nombre del titular
                </label>
                <input type="text" id="card-holder" placeholder="e.g. John Doe" />
            </div>
            <div id="exp-container">
                <label for="card-exp">
                    F.Expiración
                </label>
                <input id="card-month" type="text" placeholder="MM" length="2">
                <input id="card-year" type="text" placeholder="YY" length="2">
            </div>
            <div id="cvc-container">
                <label for="card-cvc"> CVC / CVV</label>
                <input id="card-cvc" placeholder="XXX-X" type="text" min-length="3" max-length="4">
                <p>Últimos 3 o 4 digitos</p>
            </div>
        </div>
        <div id="card-back">
            <div id="card-stripe">
            </div>

        </div>
        <input type="text" id="card-token" />
        <button type="button" id="card-btn">Tramitar pago</button>
    </div>
    <a href="pago.php">Volver al formulario de pago</a>
</body>

</html>