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

    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
    <!-- barra informativa -->
    <div class="barra-informativa d-flex justify-content-around">
        <span>
            <a href=""><i class="fas fa-map-marked-alt"></i></a> Avenida Alcade Lavadores Nº143
        </span>
        <span>
            <a href="javascript:void(0);"><i class="fas fa-clock"></i></a> Lunes a viernes 10h-20h
        </span>
        <span>
            Contacto:
            <a href=""><i class="fab fa-whatsapp-square"></i></a>
            <a href=""><i class="fas fa-phone-square-alt"></i></a>
            <a href=""><i class="fas fa-envelope-square"></i></a>
        </span>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre-mi.php">Sobre mi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactos.php">Contacto</a>
                </li>
            </ul>

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

    <!-- imagen -->
    <div>
        <img src="images/foto1.jpg" class="imagen-completa">
    </div>

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
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://github.com/Villardo"> Ghub/Villardo</a>
        </div>
    </footer>

</body>

</html>