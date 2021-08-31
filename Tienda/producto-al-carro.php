<?php
session_start();

require_once('conectar-db.php');

if (!isset($_SESSION['usuario_logueado']['carrito'])) {
    $_SESSION['usuario_logueado']['carrito'] = [];
}

$carrito_usuario_logueado = $_SESSION['usuario_logueado']['carrito'];
$sql = "SELECT * FROM productos WHERE producto_id = " . $_POST['producto_id'];

if (isset($_POST['agregar_producto'])) {
    foreach ($pdo->query($sql) as $row) {

        $arrayCarrito = [
            'producto_id' => $row['producto_id'],
            'producto_nombre' => $row['producto_nombre'],
            'producto_descripcion' => $row['producto_descripcion'],
            'producto_precio' => $row['producto_precio'],
            'producto_ruta' => $row['producto_ruta'],
            'producto_cantidad' => $_POST['producto_cantidad']
        ];

        for ($i = 0; $i < count($_SESSION['usuario_logueado']['carrito']); $i++) {
            if ($arrayCarrito['producto_id'] == $_SESSION['usuario_logueado']['carrito'][$i]['producto_id']) {
                $_SESSION['usuario_logueado']['carrito'][$i]['producto_cantidad'] =
                    $_SESSION['usuario_logueado']['carrito'][$i]['producto_cantidad'] + $_POST['producto_cantidad'];
                exit();
            }
        }
        
        $_SESSION['usuario_logueado']['carrito'][] = $arrayCarrito;

        for ($i = 0; $i < count($_SESSION['array_usuarios']); $i++) {
            if ($_SESSION['array_usuarios'][$i]['id'] == $_SESSION['usuario_logueado']['id']) {
                $_SESSION['array_usuarios'][$i]['carrito'][] = $arrayCarrito;
            }
        }

    }
    $_SESSION['nuevo_producto'] = $_POST['producto_cantidad'];
}

$pdo = null;
header("Location:productos.php");
