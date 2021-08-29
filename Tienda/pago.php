<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro estético Carla María Villar Cuadrado - Pago</title>
    <?php include 'librerias.php' ?>
    <link rel="stylesheet" type="text/css" href="css/tarjeta.css">
</head>

<body>
    <?php 
    session_start();

    //var_dump($_SESSION['items_carrito']);
    require_once('conectar-db.php');
    $flagError=false;

    echo '<div class="container pt-5">';
        echo '<div class="row">';
            echo '<div class="col-md-4 order-md-2 mb-4">';
                echo '<h4 class="d-flex justify-content-between align-items-center mb-3">';
                    echo '<span class="text-muted">Tu carrito</span>';
                    echo '<span class="badge badge-secondary badge-pill">'.$_SESSION['items_cantidad'].'</span>';
                echo '</h4>';
                echo '<ul class="list-group mb-3">';
                    foreach ($_SESSION['usuario_logueado']['carrito'] as $key => $item) {
                    echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
                        echo '<div>';
                            echo '<h6 class="my-0">'.$item['producto_nombre'].'</h6>';
                            echo '<small class="text-muted">'.$item['producto_descripcion'].'</small>';
                        echo '</div>';
                        echo '<span class="text-muted">'.($item['producto_precio']*$item['producto_cantidad']).'€ </span>';
                    echo '</li>';
                    }
        
                    echo '<li class="list-group-item d-flex justify-content-between bg-light">';
                        echo '<div class="text-sucess">';
                            echo '<h6 class="my-0">Código descuento</h6>';
                            if (isset($_POST['descontar_precio'])) {
                                $sql = 'SELECT * FROM descuentos WHERE descuento_code =  "'.$_POST['descuento_code'].'"';
                                $flagError=false;
                                foreach ($pdo->query($sql) as $row) {
                                    $descuentoId = $row['descuento_id'];
                                    $descuentoCode = $row['descuento_code'];
                                    $descuentoValor = $row['descuento_valor'];
                                }
                                if (isset($descuentoCode)) {
                                    echo '<small>'.$descuentoCode.'</small>';
                                }else{
                                    echo '<small>CODIGO ERRÓNEO</small>';
                                    $flagError=true;
                                }
                            }
                        echo '</div>';
                        echo '<span class="text-success">';
                        $precioFinal = $_SESSION['precio_total'];
        
                        if (!$flagError) {
                            if (isset($_POST['descontar_precio'])) {
                                if ($row['descuento_valor']<1) {
                                    $descuentoValor = $row['descuento_valor'];
                                    $precioFinal = $precioFinal*$descuentoValor;
                                    echo '-'.($row['descuento_valor'] * 100).' %';
                                }else{
                                    $descuentoValor = $row['descuento_valor'];
                                    $precioFinal = $precioFinal-$descuentoValor;
                                    echo '-'.$descuentoValor.' €';
                                }
                                $_SESSION['precio_final']=$precioFinal;
                            }
                        }
                        echo '</span>';
                    echo '</li> ';
                    echo '<li class="list-group-item d-flex justify-content-between">';
                        echo '<span>Total</span>';
                        echo '<strong>'.round($precioFinal,2).' € </strong>';
                    echo '</li>';
                echo '</ul>';
        
                echo '<form class="card p-2" action="#" method="POST" style="width:100%">';
                    echo '<div class="input-group">';
                        echo '<input type="text" name="descuento_code" class="form-control" placeholder="Código descuento">';
                        echo '<div class="input-group-append">';
                            echo '<button type="submit" name="descontar_precio" class="btn btn-secondary">Aplicar descuento</button>';
                        echo '</div>';
                    echo '</div>';
                echo '</form>';
                $pdo = null;
                ?>
            </div>
            
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Datos de envío</h4>
                <form action="tarjeta.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Federico" value="" required>
                            <div class="invalid-feedback">
                                El nombre es obligatorio.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Apellidos</label>
                            <input type="text" class="form-control" id="lastName" placeholder="García Lorca" value="" required>
                            <div class="invalid-feedback">
                                Los apellidos son obligatorios.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" id="address" placeholder="Rua Paz Pardo 84" required>
                        <div class="invalid-feedback">
                            Introduzca su dirección de envío.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">País</label>
                            <input type="text" class="form-control" id="country" placeholder="España" required>
                            <div class="invalid-feedback">
                                El país es obligatorio.
                            </div>
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="zip">Código postal</label>
                            <input type="text" class="form-control" id="zip" placeholder="36214" required>
                            <div class="invalid-feedback">
                                El código postal es obligatorio.
                            </div>
                        </div>
                    </div>
                        <hr class="mb-4">
                        
                        <button type="button" class="btn btn-block btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Pagar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-body">
                            <div id="form-container">
                                <div id="card-front">
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
                                    </div>
                                </div>
                                <div id="card-back">
                                    <div id="card-stripe">
                                    </div>

                                </div>
                                <input type="text" id="card-token" />
                            </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                    <button type="button" class="btn btn-primary">Tramitar pago</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <a href="carrito.php">Volver al carrito</a>
    </div>
</body>

</html>