<?php
session_start();

unset($_SESSION['usuario_logueado']["id"]);
unset($_SESSION['usuario_logueado']["nombre"]);
unset($_SESSION['usuario_logueado']["carrito"]);

header("Location:inicio.php");
