<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centro estético Carla María Villar Cuadrado - Catálogo de productos</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>
    <?php

    $arrayUsuarios = $_SESSION['array_usuarios'];
    $usuario_logueado = $_SESSION['usuario_logueado'];
    
    foreach ($arrayUsuarios as $usuario) {
        if ($usuario['id'] == $usuario_logueado['id']) {
            array_push($arrayUsuarios, $usuario_logueado);
        }
    }

    var_dump($_SESSION);

    $numRegistros = 6;
    $pagina = 1;

    if (array_key_exists('pag', $_GET)) {
        $pagina = $_GET['pag'];
    }

    if (isset($_SESSION['nuevo_producto'])) {
        if ($_SESSION['nuevo_producto']==1) {
            echo '<div class="alert alert-success" role="alert">';
                echo '<div>';
                    echo 'Has añadido '.$_SESSION['nuevo_producto'].' nuevo producto';
                echo '</div>';
                echo '<div id="cerrarAlert">';
                    echo '❎';
                echo '</div>';   
            echo '</div>';
        }else{
            echo '<div class="alert alert-success" role="alert">';
                echo '<div>';
                    echo 'Has añadido '.$_SESSION['nuevo_producto'].' nuevos productos';
                echo '</div>';
                echo '<div id="cerrarAlert">';
                    echo '❎';
                echo '</div>';   
            echo '</div>';
        }
        unset($_SESSION['nuevo_producto']);
    }

    require_once('conectar-db.php');

    $total_registros = $pdo->query('SELECT count(*) from productos')->fetchColumn();
    $totalPaginas = ceil($total_registros / $numRegistros);


    $sql = "SELECT producto_id, producto_nombre, producto_descripcion, producto_precio, producto_ruta 
                FROM `productos` WHERE 1
                    LIMIT " . (($pagina - 1) * $numRegistros) . ", $numRegistros ";

    echo '<div class="container productos mt-3">';
    foreach ($pdo->query($sql) as $row) {
        echo '<div class="card" id="'.$row['producto_id'].'">';
            echo '<div class="card-body">';
                echo '<h5 class="card-title text-center">' . $row['producto_nombre'] . '</h5>';
                echo '<img class="card-img-top" src="' . $row['producto_ruta'] . '" alt="' . $row['producto_nombre'] . '">';
                echo '<h6 class="card-subtitle mt-3 mb-2 text-muted">' . $row['producto_precio'] . '€' . '</h6>';
                echo '<p class="card-text">' . $row['producto_descripcion'] . '</p>';
            echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination justify-content-center mt-3">';
        for ($i = 0; $i < $totalPaginas; $i++) {
            if (($i + 1) == $pagina) {
                echo '<li class="page-item active"><a class="page-link" href="productos.php?pag=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="productos.php?pag=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
            }
        }
        echo '</ul>';
    echo '</nav>';
    echo '<script type="text/javascript" src="js/productos.js"></script>';
    ?>
    <?php include 'footer.php' ?>
</body>

</html>