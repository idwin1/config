<!DOCTYPE html>
<html>
<head>
    <title>Registro de Personas</title>
</head>
<body>
    <h2>Ingresar Nombre y Edad</h2>
    <form action="guardar.php" method="post">
        Nombre: <input type="text" name="nombre" required><br><br>
        Edad: <input type="number" name="edad" required><br><br>
        <input type="submit" value="Guardar">
    </form>

    <h2>Personas Registradas</h2>
    <?php
    include 'conexion.php';

    $sql = "SELECT * FROM personas";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Edad</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr><td>{$fila['id']}</td><td>{$fila['nombre']}</td><td>{$fila['edad']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros.";
    }

    $conexion->close();
    ?>
</body>
</html>
