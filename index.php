<?php
// Inicializar conexión MySQLi
$con = mysqli_init();

// Configurar SSL: cambia la ruta al certificado CA por la ruta correcta en tu servidor
mysqli_ssl_set($con, NULL, NULL, "/ruta/a/tu/ca-cert.pem", NULL, NULL);

// Conectar con SSL habilitado
if (!mysqli_real_connect($con, "bddatos.mysql.database.azure.com", "idwin", "Sandrauno1@", "datos", 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die('Error de conexión (' . mysqli_connect_errno() . '): ' . mysqli_connect_error());
}

echo "Conexión establecida con SSL.<br>";

// Definir la consulta SQL para crear la tabla
$sql = "CREATE TABLE IF NOT EXISTS personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL
)";

// Ejecutar la consulta
if ($con->query($sql) === TRUE) {
    echo "Tabla 'personas' creada correctamente.";
} else {
    echo "Error al crear la tabla: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>

