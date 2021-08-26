<?php
session_start();

if (isset($_POST['usuario_nombre'])) {

    require_once('variables.php');
    require_once('conectar-db.php');

    $sql = "SELECT * FROM usuarios WHERE usuario_nombre='" . $_POST["usuario_nombre"] . "' and usuario_password = '" . md5($salt . $_POST["usuario_password"]) . "'";

    foreach ($pdo->query($sql) as $row) {
        if (is_array($row)) {
            $usuario_logueado = array(
                'id' => $row['usuario_id'],
                'nombre' => $row['usuario_nombre'],
                'carrito' => []
            );
        }
    }

    if (isset($_SESSION['array_usuarios'])) {
        $array_usuarios = $_SESSION['array_usuarios'];
    } else {
        $array_usuarios = [];
    }

    $flag = false;

    foreach ($array_usuarios as $usuario) {
        if ($usuario["id"] == $usuario_logueado["id"]) {
            $flag = true;
        }
    }
  

    if (!$flag) {
        array_push($array_usuarios, $usuario_logueado);
        $_SESSION['array_usuarios'] = $array_usuarios;
    }

    $_SESSION['usuario_logueado'] = $usuario_logueado;

    if (!($_SESSION["id"] > 0 && isset($_SESSION["id"]))) {
        $_SESSION["flag_login_fail"] = true;
    }

    header("Location:inicio.php");
}
