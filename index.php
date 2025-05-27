<?php
$host = 'dbdatos.mysql.database.azure.com';
$port = 3306;
$username = 'idwin';
$password = 'Sandrauno1@';
$database = 'datos';

// Opciones SSL
$ssl_options = [
    PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootG2.crt.pem',
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
];

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";
    $pdo = new PDO($dsn, $username, $password, $ssl_options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h2 style='color:green;'>✅ Conexión exitosa a la base de datos MySQL en Azure.</h2>";
} catch (PDOException $e) {
    die("<h2 style='color:red;'>❌ Error al conectar: " . $e->getMessage() . "</h2>");
}

// Insertar datos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'], $_POST['edad'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    try {
        $stmt = $pdo->prepare("INSERT INTO personas (nombre, edad) VALUES (:nombre, :edad)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':edad', $edad);
        $stmt->execute();
        echo "<p style='color:blue;'>✔ Datos insertados correctamente.</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>❌ Error al insertar datos: " . $e->getMessage() . "</p>";
    }
}

// Mostrar los registros actuales
try {
    $stmt = $pdo->query("SELECT * FROM personas");
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Error al obtener registros: " . $e->getMessage() . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Personas</title>
</head>
<body>
    <h3>Formulario para agregar persona</h3>
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br><br>
        Edad: <input type="number" name="edad" required><br><br>
        <input type="submit" value="Guardar">
    </form>

    <h3>📋 Lista de personas registradas:</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
        <?php if (!empty($registros)): ?>
            <?php foreach ($registros as $fila): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['id']) ?></td>
                    <td><?= htmlspecialchars($fila['nombre']) ?></td>
                    <td><?= htmlspecialchars($fila['edad']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3">No hay registros aún.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
