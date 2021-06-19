<?php
session_start();

require_once('conectar-db.php');

if (isset($_POST['nuevo_usuario'])) {

    $usuario = $_POST['usuario_nombre'];
    if ($_POST['password1'] == $_POST['password2']) {
        $usuario_password = $_POST['password1'];
    }
    $email = $_POST['usuario_email'];
    $fecha_registro = date("Y-m-d H:i:s");

    $statement = $pdo->prepare("INSERT INTO usuarios (usuario_nombre, usuario_password, usuario_email, usuario_fecha_registro) VALUES (?, ?, ?, ?)");
    $statement->execute(array($usuario,$usuario_password,$email,$fecha_registro)); 
    
    $_SESSION["usuario_nombre"] = $usuario;
}

$pdo = null;
header("Location:inicio.php");