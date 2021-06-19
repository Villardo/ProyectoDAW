<?php
session_start();

if (count($_POST) > 0) {
    require_once('conectar-db.php');

    $sql = "SELECT * FROM usuarios WHERE usuario_nombre='" . $_POST["usuario_nombre"] . "' and usuario_password = '" . $_POST["usuario_password"] . "'";

    foreach ($pdo->query($sql) as $row) {
        if (is_array($row)) {
            $_SESSION["usuario_id"] = $row['usuario_id'];
            $_SESSION["usuario_nombre"] = $row['usuario_nombre'];
            $_SESSION["usuario_password"] = $row['usuario_password'];
            $_SESSION["usuario_email"] = $row['usuario_email'];
            $_SESSION["usuario_fecha_registro"] = $row['usuario_fecha_registro'];
        }
    }

    if (isset($_SESSION["usuario_id"])) {
        header("Location:inicio.php");
    }
}
?>
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
        <form>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox"> Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
        </form>

        <br>
        <a href="#" onclick="history.go(-1);return false;">Atrás</a>
    </div>

</body>

</html>