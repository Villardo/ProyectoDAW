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
                'email' => $row['usuario_email'],
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
        if (isset($usuario_logueado)) {
            array_push($array_usuarios, $usuario_logueado);
            $_SESSION['array_usuarios'] = $array_usuarios;
        }
    }

    $_SESSION['usuario_logueado'] = $usuario_logueado;

    for ($i = 0; $i < count($_SESSION['array_usuarios']); $i++) {
        if ($_SESSION['array_usuarios'][$i]['id'] == $_SESSION['usuario_logueado']['id']) {
            $carrito_usuario_sesion = $_SESSION['array_usuarios'][$i]['carrito'];
        }
    }

    $_SESSION['usuario_logueado']['carrito'] = $carrito_usuario_sesion;

    if (!($_SESSION['usuario_logueado']["id"] > 0 && isset($_SESSION['usuario_logueado']["id"]))) {
        $_SESSION["flag_login_fail"] = true;
    }

    header("Location:inicio.php");
}
