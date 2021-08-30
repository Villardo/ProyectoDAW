<?php
session_start();

$usuario_logueado = $_SESSION['usuario_logueado'];


if (isset($_POST['action']) && $_POST['action'] == 'actualizaCantidad') {
    $item = $_POST['item_id'];
    $itemCantidad = intval($_POST['item_cantidad']);
    $itemPrecioTotal = round(floatval($usuario_logueado['carrito'][$item]['producto_precio']),2);

    $total=round($itemCantidad * $itemPrecioTotal,2);
    $usuario_logueado['carrito'][$item]['producto_cantidad'] = $itemCantidad;
    $usuario_logueado['carrito'][$item]['producto_precio'] = $total;

    

    echo json_encode(['msg' => 'success',"total"=>$total]);
    exit();
    // echo json_encode(['msg' => $usuario_logueado['carrito'], "id" => $item, "it" => $itemCantidad, "ipt" => $itemPrecioTotal]);
}

if (isset($_POST['action']) && $_POST['action'] == 'vaciarCarrito') {
    unset($usuario_logueado['carrito']);
    echo json_encode(['msg' => 'success']);
    exit();
}
