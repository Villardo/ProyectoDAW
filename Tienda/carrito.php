<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Centro estético Carla María Villar Cuadrado - Mi carrito</title>
        <?php include 'librerias.php' ?>
    </head>
    <body>

    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>

    <?php
    $usuario_logueado = $_SESSION['usuario_logueado'];

    if (!isset($usuario_logueado["carrito"]) || count($usuario_logueado["carrito"]) == 0) {
        unset($_SESSION['items_cantidad']);
        unset($_SESSION['precio_total']);
        unset($_SESSION['precio_final']);
    }

    var_dump($_SESSION);

    echo '<div class="row" id="carrito_container">';
        echo '<div class="col-md-12">';
            if (empty($usuario_logueado['carrito'])) { 
            echo '<table class="table">';
                echo ' <tr>';
                    echo '<td>';
                        echo '<p>No tienes nada en el carrito</p>';
                    echo '</td>';
                echo '</tr>';
            echo '</table>';
            } 
            if (isset($usuario_logueado['carrito']) && count($usuario_logueado['carrito']) > 0 && isset($usuario_logueado['nombre'])) { 
            echo '<table class="table">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th>Producto</th>';
                        echo '<th>Precio</th>';
                        echo '<th>Cantidad</th>';
                        echo '<th>Total</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                        
                $precioTotalProductos = 0;
                $numeroItems = 0;

                foreach ($usuario_logueado['carrito'] as $key => $item) {
                    
                    $total = $item['producto_precio'] * $item['producto_cantidad'];
                    $precioTotalProductos += $total;
                    $numeroItems += $item['producto_cantidad'];

                    $_SESSION['items_cantidad']=$numeroItems;
                    $_SESSION['precio_total']=$precioTotalProductos;

                    echo '<tr>';
                        echo '<td>';
                            echo '<img src=" '.$item['producto_ruta'].'" class="rounded img-thumbnail mr-2" style="width:60px;">'. $item['producto_nombre'];

                            echo '<button data-btn-remove-id="'.$key.'" href="carrito.php?action=remove&item='.$key.'" class="papelera text-danger">';
                                echo '<i class="bi bi-trash-fill pl-3"></i>';
                            echo '</button>';

                        echo '</td>';
                        echo '<td>';
                            echo $item['producto_precio'].'€';
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="number" class="cantidadProducto" data-item-id="'.$key.'" value="'.$item['producto_cantidad'].'" min="1">';
                        echo '</td>';
                        echo '<td class="precioproducto" id="total'.$key.'">';
                            echo $total.'€'; 
                        echo '</td>';
                    echo '</tr>';
                }
                
                echo '<tr class="border-top border-bottom">';
                    echo '<td><button class="btn btn-danger btn-sm" id="vaciarCarrito">Vaciar carrito</button></td>';
                   
                    echo '<td></td>';
                    echo '<td id="totalitems" style="font-weight:bold">';
                            echo ($numeroItems == 1) ? $numeroItems . ' item' : $numeroItems . ' items'; 
                    echo '</td>';
                    echo '<td id="preciototal" style="font-weight:bold">
                    '. $precioTotalProductos .'€'.'</td>';
                    
                echo '</tr>';
                echo '</tr>';
                    
                echo '</tbody>';
            echo '</table>';
            echo '<div class="row">';
                echo '<div class="col-md-11">';
                    echo '<a href="pago.php">';
                        echo '<button class="btn btn-primary btn-lg float-right">Comprar</button>';
                    echo '</a>';
                echo '</div>';
            echo '</div>';
            } 
        echo '</div>';
    echo '</div>';
    ?>
    <?php include 'footer.php' ?>
    <script type="text/javascript" src="js/carrito.js"></script>

</body>

</html>