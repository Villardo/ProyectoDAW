<?php
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'actualizaCantidad') {
    $usuario_logueado = $_SESSION['usuario_logueado'];

    $item = $_POST['item_id'];
    $itemCantidad = intval($_POST['item_cantidad']);

    $itemPrecioTotal = round(floatval($usuario_logueado['carrito'][$item]['producto_precio']), 2);
    $total = round($itemCantidad * $itemPrecioTotal, 2);

    for ($i = 0; $i < count($_SESSION['array_usuarios']); $i++) {
        if ($_SESSION['array_usuarios'][$i]['id'] == $_SESSION['usuario_logueado']['id']) {
            $_SESSION['array_usuarios'][$i]['carrito'][$item]['producto_cantidad'] = $itemCantidad;
            $_SESSION['array_usuarios'][$i]['carrito'][$item]['producto_precio'] = $total;
        }
    }

    $usuario_logueado['carrito'][$item]['producto_cantidad'] = $itemCantidad;
    $usuario_logueado['carrito'][$item]['producto_precio'] = $total;
    $_SESSION['usuario_logueado']=$usuario_logueado;

    echo json_encode(['msg' => 'success', "total" => $total, "item" =>$item]);
    exit();
}

if (isset($_POST['action']) && $_POST['action'] == 'eliminaItem') {
    $item = $_POST['item_id'];
    for ($i = 0; $i < count($_SESSION['array_usuarios']); $i++) {
        if ($_SESSION['array_usuarios'][$i]['id'] == $_SESSION['usuario_logueado']['id']) {
            unset($_SESSION['array_usuarios'][$i]['carrito'][$item]);
        }
    }
    unset($_SESSION['usuario_logueado']['carrito'][$item]);
    echo json_encode(['msg' => 'success']);
    exit();
}

if (isset($_POST['action']) && $_POST['action'] == 'vaciarCarrito') {
    for ($i = 0; $i < count($_SESSION['array_usuarios']); $i++) {
        if ($_SESSION['array_usuarios'][$i]['id'] == $_SESSION['usuario_logueado']['id']) {
            unset($_SESSION['array_usuarios'][$i]['carrito']);
        }
    }
    unset($_SESSION['usuario_logueado']['carrito']);
    echo json_encode(['msg' => 'success']);
    exit();
}