<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesion</title>
    <?php include 'librerias.php' ?>
</head>

<body>
    <div class="container mt-5">
        <form action="inicio-sesion.php" method="POST">
            <div class="form-group">
                <label for="inputUser">Usuario</label>
                <input type="text" class="form-control" name="usuario_nombre" id="inputUser" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" name="usuario_password" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="form-check-label"><input name="recordar_usuario" type="checkbox" checked> Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
        </form>

        <br>
        <a href="#" onclick="history.go(-1);return false;">Atrás</a>
    </div>

</body>

</html>