<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'navbar.php' ?>

    <!-- contenido (mostrar todos con paginacion y con AJAX mostrar los de la busqueda) -->
    <?php
    $numRegistros = 6;
    $pagina = 1;

    if (array_key_exists('pag', $_GET)) {
        $pagina = $_GET['pag'];
    }

    require_once('conectar-db.php');

    $total_registros = $pdo->query('SELECT count(*) from productos')->fetchColumn(); 
    $totalPaginas = ceil($total_registros / $numRegistros);


    $sql = "SELECT producto_id, producto_nombre, producto_descripcion, producto_precio, producto_ruta 
                FROM `productos` WHERE 1
                    LIMIT " . (($pagina - 1) * $numRegistros) . ", $numRegistros ";

    echo '<div class="container productos">';
    foreach ($pdo->query($sql) as $row) {
        echo '<div class="card" style="width: 18rem;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['producto_nombre'] . '</h5>';
        echo '<img class="card-img-top" src="' . $row['producto_ruta'] . '" alt="' . $row['producto_nombre'] . '">';
        echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['producto_precio'] . '€' . '</h6>';
        echo '<p class="card-text">' . $row['producto_descripcion'] . '</p>';
        echo '<a href="#" class="card-link mr-5"><i class="fas fa-cart-plus"></i></a>';
        echo '<a href="fichaProducto.php?producto=' . $row['producto_id'] . '"><i class="fas fa-info"></i></a> </td>';
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

    ?>
    <?php include 'footer.php' ?>
</body>

</html>