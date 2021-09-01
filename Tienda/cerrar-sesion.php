<?php
session_start();

unset($_SESSION['usuario_logueado']);

header("Location:inicio.php");
