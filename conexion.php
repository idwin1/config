<?php
$host = 'dbdatos.mysql.database.azure.com';
$port = 3306;
$dbname = 'datos';
$username = 'idwin';
$password = 'Sandrauno1@';

// Ruta al certificado SSL (ajusta según tu ruta real)
$ssl_ca = 'DigiCertGlobalRootG2.crt.pem'; // Puede ser también BaltimoreCyberTrustRoot.crt.pem según Azure

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $options = [
        PDO::MYSQL_ATTR_SSL_CA => $ssl_ca,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $conexion = new PDO($dsn, $username, $password, $options);

    // Conexión exitosa (puedes eliminar este mensaje si no quieres que se muestre en producción)
    // echo "<h2 style='color:green;'>✅ Conexión establecida con PDO</h2>";
} catch (PDOException $e) {
    die("<h2 style='color:red;'>❌ Error de conexión: " . $e->getMessage() . "</h2>");
}
?>
