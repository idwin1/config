<?php
$servername = "bddatos.mysql.database.azure.com";
$username = "idwin";
$password = "Sandrauno1@";
$dbname = "datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Crear tabla
$sql = "CREATE TABLE personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabla creada exitosamente";
} else {
  echo "Error al crear la tabla: " . $conn->error;
}

$conn->close();
?>
