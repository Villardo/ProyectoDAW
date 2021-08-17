<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro estético Carla María Villar Cuadrado - Pago</title>
    <?php include 'librerias.php' ?>
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
                    foreach ($_SESSION['items_carrito'] as $key => $item) {
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
                <form action="pagar.php" method="POST">
                    <form class="needs-validation" novalidate>
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
                        <h4 class="mb-3">Método de pago</h4>
                        <!-- TODO Implementar pasarelas de pago -->
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
            
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" name="pagar" type="submit">Pagar</button>
                    </form>
                </form>
            </div>
        </div>
        <hr>
        <a href="carrito.php">Volver al carrito</a>
    </div>
</body>

</html>