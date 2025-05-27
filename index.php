<?php
$host = 'dbdatos.mysql.database.azure.com';
$port = 3306;
$username = 'idwin';
$password = 'Sandrauno1@';  // Reemplaza con tu contraseña real
$database = 'datos';  // Cambia esto si ya tienes una base

// Opciones para conexión SSL (requerido por Azure)
$ssl_options = [
    PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootG2.crt.pem', // Archivo de certificado de CA
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
];

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";
    $pdo = new PDO($dsn, $username, $password, $ssl_options);
    echo "<h2 style='color:green;'>✅ Conexión exitosa a la base de datos MySQL en Azure.</h2>";
} catch (PDOException $e) {
    echo "<h2 style='color:red;'>❌ Error al conectar: " . $e->getMessage() . "</h2>";
}
// Cerrar conexión
$con->close();
?>
