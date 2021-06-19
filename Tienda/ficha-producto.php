<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Producto</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>

    <?php 
    if (array_key_exists('producto', $_GET)) {
        $cod_producto = $_GET['producto'];
    }

    require_once('conectar-db.php');

    $sql="SELECT producto_id, producto_nombre, producto_descripcion, producto_precio, producto_ruta 
        FROM `productos` WHERE producto_id= $cod_producto";

    echo '<div class="container" id="producto">';
    foreach ($pdo->query($sql) as $row) {
        echo '<div class="row mt-3">';
            echo '<div class="col-md-6 col-12-sm">';
                echo '<img class="card-img-info" src="' . $row['producto_ruta'] . '" alt="' . $row['producto_nombre'] . '">';            
            echo '</div>';
            echo '<div class="col-md-6 col-12-sm mt-3">';
                echo '<div class="col-md-6 col-12-sm">';
                    echo '<h5 class="card-title">' . $row['producto_nombre'] . '</h5>';                
                echo '</div>';
                echo '<div class="col-md-6 col-12-sm">';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['producto_precio'] . '€' . '</h6>';
                    
                    echo '<form class="form-inline mt-5" method="POST">';
                        echo '<div class="input-group mb-3">';
                            echo ' <div class="input-group-prepend">';
                                echo '<span class="input-group-text"><i class="fas fa-cart-plus"></i></span>';
                            echo '</div>';
                            echo '<input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="20" value="1">';
                            echo '<input type="hidden" name="product_id" value="1">';
                            echo '<div class="input-group-append">';
                                echo '<button type="submit" class="btn btn-primary" name="add_to_cart" value="add to cart">Añadir al carrito</button>';
                            echo '</div>';                        
                        echo '</div>';
                    
                        echo '</form>';
                    echo '<p class="card-text mt-3">' . $row['producto_descripcion'] . '</p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>
    
    <?php include 'footer.php' ?>
</body>

</html>