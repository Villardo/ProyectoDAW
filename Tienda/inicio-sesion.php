<?php
session_start();

if (isset($_POST['usuario_nombre'])) {
    require_once('conectar-db.php');

    $sql = "SELECT * FROM usuarios WHERE usuario_nombre='" . $_POST["usuario_nombre"] . "' and usuario_password = '" . $_POST["usuario_password"] . "'";

    foreach ($pdo->query($sql) as $row) {
        if (is_array($row)) {
            $_SESSION["usuario_id"] = $row['usuario_id'];
            $_SESSION["usuario_nombre"] = $row['usuario_nombre'];
        }
    }

    if (isset($_SESSION["usuario_id"])) {
        header("Location:inicio.php");
    } else {
        header("Location:inicio-sesion.php");
    }
}
