<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centro estético Carla María Villar Cuadrado - Inicio</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>
    
    <?php
    // var_dump($_SESSION);
    ?>

    <div class="container-fluid">
        <div class="row">
            <div id="carouselImagen" class="carousel slide col-12 pt-2 grab d-block w-100" data-ride="carousel" data-interval="false">
                <div id="carousel-controls">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselImagen" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselImagen" data-slide-to="1"></li>
                        <li data-target="#carouselImagen" data-slide-to="2"></li>
                    </ol>
                </div>
                <div class="carousel-inner img-fluid d-block w-100">
                    <div class="carousel-item active">
                        <img src="images/foto1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/foto6.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/foto4.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="row eslogan text-center">
            <div class="col-12 blockquote eslogan-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil ut esse provident tempore!
            </div>
        </div>
        <div class="noticias text-center">
            <div class="row">
                <div class="col-md-6 col-xs-12 descuento">
                    <h1 class="display-4 ">50% OFF</h1>
                </div>
                <div class="col-md-6 col-xs-12 descuento">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis ducimus nihil accusantium "MITADPRECIO"
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-xs-12 descuento">
                    Llevate un descuento de 10€ en tu primera compra con un valor superior a 50€ al introducir "PRIMERACOMPRA"
                </div>
                <div class="col-md-6 col-xs-12 descuento">
                    <h1 class="display-4 ">-10 €</h1>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script type="text/javascript" src="js/inicio.js"></script>
</body>

</html>