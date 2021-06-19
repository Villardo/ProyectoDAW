<!-- navbar -->

<?php
include 'variables.php';

echo '<script type="text/javascript" src="js/navbar.js"></script>';

echo '<nav class="navbar navbar-expand-sm navbar-light bg-light">';
    echo '<a class="navbar-brand" href="#">'.$logo_ruta.'</a>';
    echo '<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">';
        echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="collapsibleNavId">';
        echo '<ul class="navbar-nav mr-auto mt-2 mt-lg-0">';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="inicio.php">'.$texto_navbar_inicio.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="sobre-mi.php">'.$texto_navbar_sobre_mi.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="servicios.php">'.$texto_navbar_servicios.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="productos.php">'.$texto_navbar_productos.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="contacto.php">'.$texto_navbar_contacto.'</a>';
            echo '</li>';
        echo '</ul>';

        echo '<ul class="navbar-nav ml-auto mt-2 mt-lg-0">';
            echo '<li class="nav-item">';
                echo '<a href="carrito.php"><i class="fas fa-shopping-cart fa-2x"></i></a>';
            echo '</li>';

            echo '<li class="nav-item dropdown mr-5">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbar-cuenta" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';               
                    // if ($_SESSION["usuario_nombre"]) {
                    //     echo $_SESSION["usuario_nombre"];                         
                    // } else {
                        echo $texto_navbar_mi_cuenta;    
                    // }   
                echo '</a>';
                echo '<div class="dropdown-menu" aria-labelledby="navbar-cuenta">';
                    echo '<a class="dropdown-item" href="iniciar-sesion.php">'.$texto_navbar_login_out.'</a>';
                    echo '<a class="dropdown-item" href="registro.php">'.$texto_navbar_registrarse.'</a>';
                echo '</div>';
            echo '</li>';

        echo '</ul>';
    echo '</div>';
echo '</nav>';
?>

    