<?php
require_once "../actividad1/config.php";

// Conexión a la base de datos
try {
    $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);

    if (!empty($nombre)) {
        try {
            // Consulta preparada para evitar inyección SQL
            $sql = "SELECT * FROM empleados WHERE nombre LIKE :nombre";
            $stmt = $conexion->prepare($sql);
            $parametro = "%" . $nombre . "%";
            $stmt->bindParam(":nombre", $parametro, PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    } else {
        echo "<p>Por favor, introduce un nombre.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Empleado</title>
</head>

<body>

    <h2>Buscar Empleado por Nombre</h2>

    <form method="post" action="">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <?php if (count($resultados) > 0): ?>
            <h3>Resultados:</h3>
            <table border="1" cellpadding="5">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                </tr>
                <?php foreach ($resultados as $empleado): ?>
                    <tr>
                        <td><?= htmlspecialchars($empleado['id']) ?></td>
                        <td><?= htmlspecialchars($empleado['nombre']) ?></td>
                        <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                        <td><?= htmlspecialchars($empleado['salario']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron empleados con ese nombre.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>