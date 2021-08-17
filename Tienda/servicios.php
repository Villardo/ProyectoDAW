<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centro estético Carla María Villar Cuadrado - Servicios</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>

    <?php
    require_once('conectar-db.php');
    $sql = "SELECT servicio_id, servicio_nombre, servicio_descripcion, servicio_ruta
                FROM servicios WHERE 1";

    echo '<div class="container servicios mt-3">';
    foreach ($pdo->query($sql) as $row) {
        echo '<div class="row servicio mt-3" id="servicio_'.$row['servicio_id'].'">';
       
        if ($row['servicio_ruta']!=null && !empty($row['servicio_ruta'])) {
            echo '<div class="col-md-8 col-sm-6">';
                echo '<p class="titulo">'.$row['servicio_nombre'].'</p>';
                echo '<p>'.$row['servicio_descripcion'].'</p>';
            echo '</div>';
            echo '<div class="col-md-4 col-sm-6">';
                echo '<img class="img-fluid rounded imagen-servicio" src="'.$row['servicio_ruta'].'">';                
            echo '</div>';
        }else{
            echo '<div class="col-12">';
                echo '<p class="titulo">'.$row['servicio_nombre'].'</p>';
                echo '<p>'.$row['servicio_descripcion'].'</p>';
            echo '</div>';
        }   
        echo '</div>';        
    }
    echo '</div>';
    ?>
    <?php include 'footer.php' ?>
</body>

</html>