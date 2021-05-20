<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php">Inicio </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre-mi.php">Sobre mi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Productos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>

            <!-- buscador -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <!-- cuenta -->
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href=""><i class="fas fa-shopping-cart fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mi cuenta</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- contenido (mostrar todos con paginacion y con AJAX mostrar los de la busqueda) -->
    <?php
        $numRegistros = 3; 
        $pagina = 1; 

        if (array_key_exists('pag', $_GET)) {
            $pagina = $_GET['pag'];
        }

        require_once('conectar-db.php');

        $res_query = mysqli_query(
            $db,
            "SELECT * FROM productos"
        );
        $total_registros = mysqli_num_rows($res_query);

        $totalPaginas = ceil($total_registros / $numRegistros);

        $res_query = mysqli_query(
            $db,
            "SELECT producto_id,producto_nombre,producto_descripcion,producto_precio FROM `productos` WHERE 1
                LIMIT " . (($pagina - 1) * $numRegistros) . ", $numRegistros "
        );
        echo '<div class="container" id="fondo">';
            echo '<div class="row">';
                echo '<table class="table bg-white table-bordered mt-5" style="width:100%">';
                echo '<th colspan=3 class="table-dark text-light text-center">'; 
                    echo '<h1>PRODUCTOS</h1>';
                echo '</th>';
                    echo '<tr class="table-success font-weight-bold">';             
                        echo '<td>PRODUCTO</td>';         
                        echo '<td colspan=2>TEST</td>';            
                        
                    echo '</tr>';
                
                while ($row = mysqli_fetch_array($res_query)) {
                    echo '<tr>';
                        echo '<td>' . $row['producto_nombre'] . '</td>';
                        echo '<td>' . $row['producto_descripcion'] . '</td>';
                        echo '<td>' . $row['producto_precio'] . '€</td>';
                        echo '<td> <a href="fichaReceta.php?receta='.$row['producto_id'].'">Mas información</a> </td>';
                    echo '</tr>';
                }                
                echo '</table>';              
            echo '</div>';

            echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination justify-content-center">';
                    for ($i = 0; $i < $totalPaginas; $i++) {
                        if(($i + 1)== $pagina){
                            echo '<li class="page-item active"><a class="page-link" href="productos.php?pag=' . ($i + 1) . '">'. ($i + 1) .'</a></li>';                       
                        }else{
                            echo '<li class="page-item"><a class="page-link" href="productos.php?pag=' . ($i + 1) . '">'. ($i + 1) .'</a></li>';                       
                        }
                    }                    
                echo '</ul>';
            echo '</nav>';
        echo '</div>';
        ?>



    <!-- footer -->
    <footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-center">
            <div class="col mt-3">
                <p>Avenida Alcade Lavadores Nº143<br>
                    Lunes a viernes 10h-20h<br>
                    <span>
                        Contacto:
                        <a href=""><i class="fab fa-whatsapp-square"></i></a>
                        <a href=""><i class="fas fa-phone-square-alt"></i></a>
                        <a href=""><i class="fas fa-envelope-square"></i></a>
                    </span><br>
                </p>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="https://github.com/Villardo"> Ghub/Villardo</a>
        </div>
    </footer>
</body>

</html>