<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <div class="container mt-5">
        <form>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="inputPassword2">Repetir contraseña</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

        <br>
        <a href="#" onclick="history.go(-1);return false;">Atrás</a>
    </div>

</body>

</html>