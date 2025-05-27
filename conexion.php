<?php
$host = 'dbdatos.mysql.database.azure.com';
$port = 3306;
$username = 'idwin';
$password = 'Sandrauno1@';  // Reemplaza con tu contraseña real
$database = 'datos'; // Reemplaza con el nombre real de tu base

// Ruta al certificado SSL (descárgalo si no lo tienes aún)
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem'; // Cambia la ruta según donde lo pongas

$conexion = new mysqli($host, $username, $password, $database, $port, null);

// Establecer SSL
$conexion->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);

// Verifica conexión
if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}
?>
