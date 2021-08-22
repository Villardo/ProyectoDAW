<?php
session_start();

if (isset($_POST['nuevo_usuario'])) {
    
    require_once('variables.php');
    require_once('conectar-db.php');

    $usuario = $_POST['usuario_nombre'];
    if ($_POST['new_usuario_password1'] == $_POST['new_usuario_password2']) {
        $usuario_password_hassed = md5($salt . $_POST['new_usuario_password1']);
    }
    $email = $_POST['usuario_email'];
    $fecha_registro = date("Y-m-d H:i:s");

    $statement = $pdo->prepare("INSERT INTO usuarios (usuario_nombre, usuario_password, usuario_email, usuario_fecha_registro) VALUES (?, ?, ?, ?)");
    $statement->execute(array($usuario, $usuario_password_hassed, $email, $fecha_registro));

    $_SESSION["usuario_nombre"] = $usuario;
}

$pdo = null;
header("Location:inicio.php");
