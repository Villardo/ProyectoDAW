<?php
session_start();

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password1'])) {

    require_once('variables.php');
    require_once('conectar-db.php');

    $usuario = $_POST['nombre'];
    $usuario_password_hassed = md5($salt . $_POST['password1']);
    $email = $_POST['email'];
    $fecha_registro = date("Y-m-d H:i:s");

    $statement = $pdo->prepare("INSERT INTO usuarios (usuario_nombre, usuario_password, usuario_email, usuario_fecha_registro) VALUES (?, ?, ?, ?)");

    if ($statement->execute(array($usuario, $usuario_password_hassed, $email, $fecha_registro))) {
        $_SESSION["nombre"] = $usuario;

        echo true;
        return;
    }
    echo false;
    return ;
    //$statement->execute(array($usuario, $usuario_password_hassed, $email, $fecha_registro));
}
$pdo = null;

echo false;
return;
