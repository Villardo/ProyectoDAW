<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centro estético Carla María Villar Cuadrado - Ficha de producto</title>
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
        echo '<div class="row mt-5">';
            echo '<div class="col-md-6 col-12-sm p-3 alinear-derecha">';
                echo '<img class="card-img-info" src="' . $row['producto_ruta'] . '" alt="' . $row['producto_nombre'] . '">';            
            echo '</div>';
            echo '<div class="col-md-6 col-12-sm mt-3">';
                echo '<div class="col-md-6 col-12-sm">';
                    echo '<h5 class="card-title">' . $row['producto_nombre'] . '</h5>';                
                echo '</div>';
                echo '<div class="col-md-6 col-12-sm">';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['producto_precio'] . '€' . '</h6>';
                    
                    echo '<form class="form-inline mt-5" action="producto-al-carro.php" method="POST">';
                        echo '<div class="input-group mb-3">';
                            echo ' <div class="input-group-prepend">';
                                echo '<span class="input-group-text"><i class="fas fa-cart-plus"></i></span>';
                            echo '</div>';
                            echo '<input type="number" name="producto_cantidad" id="productQty" class="form-control" placeholder="Cantidad" min="1" value="1">';
                            echo '<input type="hidden" name="producto_id" value="'. $row['producto_id'] .'">';
                            echo '<div class="input-group-append">';
                                if (isset($_SESSION["nombre"])) {
                                    echo '<button type="submit" class="btn btn-primary" name="agregar_producto" value="agregar_producto">Añadir al carrito</button>';
                                }else {
                                    echo '<button type="submit" class="btn btn-primary tooltip" name="agregar_producto" value="agregar_producto" disabled>
                                    Añadir al carrito <span class="tooltiptext">Es necesario registrarse</span>
                                    </button>';
                                }
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