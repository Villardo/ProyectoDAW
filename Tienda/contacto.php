<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <?php include 'infobar.php' ?>
    <?php include 'navbar.php' ?>

    <div class="container-fluid">
        <div class="row contacto-foto">
            <!-- imagen -->
        </div>
        <div class="row contacto-abajo">
            <div class="col-md-6 col-sm-12">
                <form class="mt-3 contacto-form" action="enviar-mail.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" id="contacto_nombre" name="contacto_nombre" placeholder="Nombre">
                        </div>
                        <div class="col-6">
                            <input type="tel" class="form-control" id="contacto_telf" name="contacto_telf" placeholder="Teléfono (opcional)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="email" class="form-control" id="contacto_email" name="contacto_email" placeholder="Email">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <textarea id="txtid" class="form-control" name="contacto_texto" rows="4" cols="50" maxlength="200"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group form-check pt-4">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Acepto enviar mis datos...</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 btn-block">
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6 col-sm-12 googlemaps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2955.054024115711!2d-8.695343184570465!3d42.21328997919706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25882f887b0879%3A0x1860e2dcd7c15677!2sColexio%20de%20Fomento%20Montecastelo!5e0!3m2!1ses!2ses!4v1624072717570!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>