<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre mi</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 col-xs-12 imagen-cara">
                <img src="images/svg/cara.svg" class="img-fluid" id="cara" style="max-height: 45vh; min-height: 45vh;" />
            </div>
            <div class="col-md-6 col-xs-12 sobre-mi-texto">
                <p>Hola, mi nombre es Carla Mª Villar Cuadrado. Me llevo dedicando al mundo de la estética desde hace casi 10 años y he decidido montar por mi propia cuenta este negocio.</p>
                <p>Cuento con las siguientes titulaciones:</p>
                <ul>
                    <li>Grado superior de estética</li>
                    <li>Curso de fisioterapia</li>
                    <li>Curso de quiromasaje</li>
                </ul>
            </div>
        </div>

        <div class="row iconos pt-3 mt-3">
            <div id="icono1" class="col-2 icono"><img class="sobre-mi sobre-mi-icono" src="images/svg/beauty-treatment.svg" data-ruta="images/foto1.jpg" /></div>
            <div id="icono2" class="col-2 icono"><img class="sobre-mi sobre-mi-icono" src="images/svg/make-up.svg" data-ruta="images/foto7.jpg" /></div>
            <div id="icono3" class="col-2 icono"><img class="sobre-mi sobre-mi-icono" src="images/svg/productos.svg" data-ruta="images/foto3.jpg" /></div>
            <div id="icono4" class="col-2 icono"><img class="sobre-mi sobre-mi-icono" src="images/svg/massage.svg" data-ruta="images/foto4.jpg" /></div>
            <div id="icono5" class="col-2 icono"><img class="sobre-mi sobre-mi-icono" src="images/svg/spa.svg" data-ruta="images/foto5.jpg" /></div>
            <div id="icono6" class="col-2 icono"><img class="sobre-mi sobre-mi-icono" src="images/svg/pintar.svg" data-ruta="images/foto6.jpg" /></div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script type="text/javascript" src="js/sobre-mi.js"></script>

</body>

</html>