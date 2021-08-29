<?php
include 'variables.php';

$to = $email;
$subject = $_POST['contacto_razon'];
$message = "";

if (isset($_POST['contacto_nombre']) && !empty($_POST['contacto_nombre'])) {
    $message ="Hola, soy el usuario ". $_POST['contacto_nombre'] .", ".$_POST['contacto_telf']. "\r\n";
}
$message .= $_POST['contacto_texto'];

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <' . $_POST['contacto_email'] . '>' . "\r\n";

//No funciona en servidor local --> https://stackoverflow.com/questions/5335273/how-can-i-send-an-email-using-php
mail($to, $subject, $message, $headers); 

header("Location:contacto.php");