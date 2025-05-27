<?php
// Datos de conexión
$hostname = "dbdatos.mysql.database.azure.com";
$port = 3306;
$username = "idwin";
$password = "Sandrauno1@";  // Cambia por tu contraseña real
$database = "datos"; // Cambia por tu base de datos

// Crear conexión sin SSL
$con = new mysqli($hostname, $username, $password, $database, $port);

// Verificar conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

echo "Conexión exitosa.<br>";

// Crear tabla personas si no existe
$sql = "CREATE TABLE IF NOT EXISTS personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL
)";

if ($con->query($sql) === TRUE) {
    echo "Tabla 'personas' creada correctamente.";
} else {
    echo "Error al crear la tabla: " . $con->error;
}

// Cerrar conexión
$con->close();
?>
