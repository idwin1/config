<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];

$sql = "INSERT INTO personas (nombre, edad) VALUES ('$nombre', $edad)";

if ($conexion->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.<br><a href='index.php'>Volver</a>";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
