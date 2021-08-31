<?php
session_start();

require_once('variables.php');
require_once('conectar-db.php');

if (
    isset($_POST['nombre']) && isset($_POST['apellidos'])
    && isset($_POST['direccion']) && isset($_POST['pais'])
    && isset($_POST['codigoPostal']) && isset($_POST['cardnumber'])
    && isset($_POST['cardholder']) && isset($_POST['cardmonth'])
    && isset($_POST['cardyear']) && isset($_POST['cardcvc'])
) {

    $statement_facturacion = $pdo->prepare("INSERT INTO facturacion (id_usuario, nombre, apellidos, direccion, pais, codigo_postal, 
    numero_tarjeta, tarjeta_mes, tarjeta_year, cvv) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement_ventas = $pdo->prepare("INSERT INTO ventas (id_producto, cant_producto, id_usuario, precio_final, id_datos_facturacion) 
    VALUES ( ?, ?, ?, ?, ?)");

    if ($statement_facturacion->execute(array(
        $_SESSION['usuario_logueado']['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['pais'], $_POST['codigoPostal'],
        $_POST['cardnumber'], $_POST['cardmonth'], $_POST['cardyear'], $_POST['cardcvc']
    ))) {

        $id_facturacion = 0;
        
        $sql = "SELECT id FROM facturacion WHERE id_usuario= ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['usuario_logueado']['id']]);
        $id_facturacion = $stmt->fetch()[0];

        foreach ($_SESSION['usuario_logueado']['carrito'] as $key => $item) {
            if ($statement_ventas->execute(array(
                $item['producto_id'], $item['producto_cantidad'],
                $_SESSION['usuario_logueado']['id'], $_SESSION["precio_final"], $id_facturacion
            ))) {
                unset($_SESSION['usuario_logueado']["carrito"]);
                echo "venta";
                return;
            } else {
                echo "error";
                return;
            }
        }
    } else {
        echo "error";
        return;
    }
}
$pdo = null;
echo "error";
return;
