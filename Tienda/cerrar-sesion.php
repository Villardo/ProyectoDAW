<?php
session_start();
unset($_SESSION["usuario_id"]);
unset($_SESSION["usuario_nombre"]);

header("Location:inicio.php");
?>