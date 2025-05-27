<?php
$host = 'dbdatos.mysql.database.azure.com';
$port = 3306;
$username = 'idwin';
$password = 'Sandrauno1@';
$database = 'datos';

// Ruta al certificado SSL
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem'; // Asegúrate que esté en el mismo directorio o coloca la ruta absoluta

$conexion = new mysqli();
$conexion->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);
$conexion->real_connect($host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL);

if ($conexion->connect_error) {
    echo "<h2 style='color:red;'>❌ Conexión fallida: " . $conexion->connect_error . "</h2>";
} else {
    echo "<h2 style='color:green;'>✅ Conexión exitosa a la base de datos Azure MySQL</h2>";
    echo "<p>Servidor: " . $conexion->host_info . "</p>";
}

$conexion->close();
?>
