<?php
session_start();

$usuario_logueado=$_SESSION['usuario_logueado'];

if(isset($_POST['action']) && $_POST['action'] == 'actualizaCantidad')
{
    $item = $_POST['item_id'];
    $itemCantidad = $_POST['item_cantidad'];
    $itemPrecioTotal = $usuario_logueado['carrito'][$item]['precio_total'];

    $usuario_logueado['carrito'][$item]['producto_cantidad'] = $itemCantidad;
    $usuario_logueado['carrito'][$item]['precio_total'] = $itemCantidad * $itemPrecioTotal;

    echo json_encode(['msg' => 'success']);
    exit();
}

if(isset($_POST['action']) && $_POST['action'] == 'vaciarCarrito')
{
    unset($usuario_logueado['carrito']);
    echo json_encode(['msg' => 'success']);
    exit();
}
