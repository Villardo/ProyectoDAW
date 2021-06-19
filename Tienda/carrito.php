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
    // Falta sesiones (meter en sesion el carrito y las compras al ejecutarlas crear una tabla)

    session_start();

    if (isset($_GET['action'], $_GET['item']) && $_GET['action'] == 'remove') {
        unset($_SESSION['items_carrito'][$_GET['item']]);
        header('location:cart.php');
        exit();
    }

    //pre($_SESSION);
    ?>
    <div class="row">
        <div class="col-md-12">
            <?php if (empty($_SESSION['items_carrito'])) { ?>
                <table class="table">
                    <tr>
                        <td>
                            <p>Your cart is emty</p>
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
                            $total = $item['producto_precio'] * $item['cantidad'];
                            $precioTotalProducto += $total;
                            $numeroItems += $item['cantidad'];
                        ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $imgUrl; ?>" class="rounded img-thumbnail mr-2" style="width:60px;"><?php echo $item['producto_nombre']; ?>

                                    <a href="carrito.php?action=remove&item=<?php echo $key ?>" class="text-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>

                                </td>
                                <td>
                                    <?php echo $item['producto_precio']; ?>€
                                </td>
                                <td>
                                    <input type="number" name="" class="cart-cantidad-single" data-item-id="<?php echo $key ?>" value="<?php echo $item['cantidad']; ?>" min="1" max="20">
                                </td>
                                <td>
                                    <?php echo $total; ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr class="border-top border-bottom">
                            <td><button class="btn btn-danger btn-sm" id="emptyCart">Vaciar carrito</button></td>
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
</body>
</html>