<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi carrito</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>

    <?php
    // Falta asociar las sesiones a su respectivo usuario, listado items

    if (isset($_GET['action'], $_GET['item']) && $_GET['action'] == 'remove') {
        unset($_SESSION['items_carrito'][$_GET['item']]);
        header('location:carrito.php');
        exit();
    }

    ?>
    <div class="row">
        <div class="col-md-12">
            <?php if (empty($_SESSION['items_carrito'])) { ?>
                <table class="table">
                    <tr>
                        <td>
                            <p>No tienes nada en el carrito</p>
                        </td>
                    </tr>
                </table>
            <?php } ?>
            <?php if (isset($_SESSION['items_carrito']) && count($_SESSION['items_carrito']) > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $precioTotalProducto = 0;
                        $numeroItems = 0;
                        foreach ($_SESSION['items_carrito'] as $key => $item) {

                            $imgUrl = $item['producto_ruta'];
                            $total = $item['producto_precio'] * $item['producto_cantidad'];
                            $precioTotalProducto += $total;
                            $numeroItems += $item['producto_cantidad'];
                        
                            echo '<tr>';
                                echo '<td>';
                                    echo '<img src=" '.$imgUrl.'" class="rounded img-thumbnail mr-2" style="width:60px;">'. $item['producto_nombre'];

                                    echo '<a href="carrito.php?action=remove&item='.$key.'" class="text-danger">';
                                        echo '<i class="bi bi-trash-fill"></i>';
                                    echo '</a>';

                                echo '</td>';
                                echo '<td>';
                                    echo $item['producto_precio'].'€';
                                echo '</td>';
                                echo '<td>';
                                    echo '<input type="number" class="cantidadProducto" data-item-id="'.$key.'" value="'.$item['producto_cantidad'].'" min="1" max="20">';
                                echo '</td>';
                                echo '<td>';
                                    echo $total; 
                                echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr class="border-top border-bottom">
                            <td><button class="btn btn-danger btn-sm" id="vaciarCarrito">Vaciar carrito</button></td>
                            <td></td>
                            <td>
                                <strong>
                                    <?php
                                    echo ($numeroItems == 1) ? $numeroItems . ' item' : $numeroItems . ' items'; ?>
                                </strong>
                            </td>
                            <td><strong>$<?php echo $precioTotalProducto; ?></strong></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-11">
                        <a href="pago.php">
                            <button class="btn btn-primary btn-lg float-right">Comprar</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script type="text/javascript" src="js/carrito.js"></script>

</body>

</html>