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
        <form action="registrar-nuevo-usuario.php" method="POST">
            <div class="form-group">
                <label for="inputUser">Nombre de usuario</label>
                <input type="text" class="form-control" id="inputUser" name="usuario_nombre" placeholder="Usuario...">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="usuario_email" placeholder="Email...">
            </div>
            <div class="form-group">
                <label for="inputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword1" name="password1" placeholder="Password...">
            </div>
            <div class="form-group">
                <label for="inputPassword2">Repetir contraseña</label>
                <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Repite la password...">
            </div>
            <button type="submit" class="btn btn-primary" name="nuevo_usuario">Registrarse</button>
        </form>

        <br>
        <a href="#" onclick="history.go(-1);return false;">Atrás</a>
    </div>

</body>

</html>