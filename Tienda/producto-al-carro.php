<?php
session_start();

require_once('conectar-db.php');
$sql = "SELECT * FROM productos WHERE producto_id = " . $_POST['producto_id'];

if (isset($_POST['agregar_producto'])) {

    foreach ($pdo->query($sql) as $row) {
        
        // if (array_key_exists($row['producto_nombre'] , $_SESSION['items_carrito'])) {
        //     $_SESSION['items_carrito']['producto_cantidad']+=$_POST['producto_cantidad'];
        // }
        
        $arrayCarrito = [
            'producto_id' => $row['producto_id'],
            'producto_nombre' => $row['producto_nombre'],
            'producto_descripcion' => $row['producto_descripcion'],
            'producto_precio' => $row['producto_precio'],
            'producto_ruta' => $row['producto_ruta'],
            'producto_cantidad' => $_POST['producto_cantidad']
        ];
    }
    $_SESSION['items_carrito'][] = $arrayCarrito;
    $_SESSION['nuevo_producto'] = $_POST['producto_cantidad'];
}

$pdo = null;
header("Location:productos.php");
