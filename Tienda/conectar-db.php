<?php
// CREATE USER 'cliente'@'localhost' IDENTIFIED BY 'cliente_password';
// GRANT SELECT ON centro_estetica.productos TO 'cliente'@'localhost'

// CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin_password';
// GRANT ALL PRIVILEGES ON centro_estetica.productos TO 'admin'@'localhost';

$servername = "localhost";
$username = "cliente";
$password = "cliente_password";
$dbname = "centro_estetica";

 try {
     $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Conectado a la base de datos correctamente";
 } catch (PDOException $e) {
     echo "La conexión ha fallado: " . $e->getMessage();
 }
