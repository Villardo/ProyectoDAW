<?php
session_start();

if(isset($_POST['action']) && $_POST['action'] == 'actualizaCantidad')
{
    $item = $_POST['item_id'];
    $itemCantidad = $_POST['item_cantidad'];
    $itemPrecioTotal = $_SESSION['items_carrito'][$item]['precio_total'];

    $_SESSION['items_carrito'][$item]['producto_cantidad'] = $itemCantidad;
    
    echo json_encode(['msg' => 'success']);
    exit();
}

if(isset($_POST['action']) && $_POST['action'] == 'empty')
{
    unset($_SESSION['items_carrito']);
    echo json_encode(['msg' => 'success']);
    exit();
}