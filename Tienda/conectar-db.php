<?php
// CREATE USER 'cliente'@'localhost' IDENTIFIED BY 'cliente_password';
// GRANT SELECT ON centro_estetica.productos TO 'cliente'@'localhost'

// CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin_password';
// GRANT ALL PRIVILEGES ON centro_estetica.productos TO 'admin'@'localhost';

$servername = "localhost";
$username = "cliente";
$password = "cliente_password";
$dbname = "centro_estetica";

$db = mysqli_connect($servername, $username, $password, $dbname);
$db->set_charset("utf8");

// TODO PDO

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
