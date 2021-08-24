<?php
session_start();

require_once('conectar-db.php');

if (isset($_POST['pagar'])) {

    //TODO - Darle una vuelta, no tiene sentido repetir el precio

    // foreach ($_SESSION['items_carrito'] as $key => $value) {
            
    //     $venta_usuario_id = $_SESSION['id'];
    //     $venta_producto_id = $row['producto_id'];
    //     $venta_producto_cantidad = $row['producto_id'];
    //     $venta_precio_final = $_SESSION['precio_final'];
    // }


    $statement = $pdo->prepare("INSERT INTO ventas (venta_usuario_id, venta_producto_id, venta_producto_cantidad, venta_precio_final) VALUES (?, ?, ?, ?)");
    $statement->execute(array($venta_usuario_id, $venta_producto_id, $venta_producto_cantidad, $venta_precio_final));

    $_SESSION["nombre"] = $usuario;
}

$pdo = null;
header("Location:inicio.php");
