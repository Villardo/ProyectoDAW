<?php
session_start();

if (isset($_POST['usuario_nombre'])) {

    require_once('variables.php');
    require_once('conectar-db.php');

    $sql = "SELECT * FROM usuarios WHERE usuario_nombre='" . $_POST["usuario_nombre"] . "' and usuario_password = '" . md5($salt . $_POST["usuario_password"]) . "'";

    foreach ($pdo->query($sql) as $row) {
        if (is_array($row)) {
            $_SESSION["id"] = $row['usuario_id'];
            $_SESSION["nombre"] = $row['usuario_nombre'];
        }
    }

    if (!($_SESSION["id"] > 0 && isset($_SESSION["id"]))) {
        $_SESSION["flag_login_fail"] = true;
    }

    header("Location:inicio.php");
}
