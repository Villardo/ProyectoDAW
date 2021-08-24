<?php
session_start();

unset($_SESSION["id"]);
unset($_SESSION["nombre"]);

header("Location:inicio.php");
?>