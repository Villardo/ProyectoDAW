<?php
// CREATE USER 'cliente'@'localhost' IDENTIFIED BY 'cliente_password';
// GRANT SELECT ON centro_estetica.productos TO 'cliente'@'localhost'

// CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin_password';
// GRANT ALL PRIVILEGES ON centro_estetica.productos TO 'admin'@'localhost';

$db = mysqli_connect("localhost", "cliente", "cliente_password", "centro_estetica");
$db->set_charset("utf8");
