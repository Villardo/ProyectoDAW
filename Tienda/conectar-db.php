<?php
//  CREATE USER IF NOT EXISTS 'cliente'@'localhost' IDENTIFIED BY 'cliente_password';
//     GRANT SELECT ON centro_estetica.productos TO 'cliente'@'localhost';
//     GRANT SELECT ON centro_estetica.servicios TO 'cliente'@'localhost';
//     GRANT INSERT ON centro_estetica.usuarios TO 'cliente'@'localhost';
//     GRANT SELECT ON centro_estetica.usuarios TO 'cliente'@'localhost';
//     GRANT SELECT ON centro_estetica.descuentos TO 'cliente'@'localhost';
//     GRANT INSERT ON centro_estetica.ventas TO 'cliente'@'localhost';
//     GRANT SELECT ON centro_estetica.facturacion TO 'cliente'@'localhost';
//     GRANT INSERT ON centro_estetica.facturacion TO 'cliente'@'localhost';
//     GRANT SELECT ON centro_estetica.ventas TO 'cliente'@'localhost';
//     GRANT INSERT ON centro_estetica.ventas TO 'cliente'@'localhost';


// CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'admin_password';
// GRANT ALL PRIVILEGES ON centro_estetica.productos TO 'admin'@'localhost';

$servername = "localhost";
$username = "cliente";
$password = "cliente_password";
$dbname = "centro_estetica";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "La conexión ha fallado: " . $e->getMessage();
}
