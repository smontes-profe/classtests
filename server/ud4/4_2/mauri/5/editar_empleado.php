<?php
// Cargar configuración
require_once __DIR__ . '/../1/config.php';

// ID del empleado a editar (querystring)
$id = $_GET['id'] ?? null;
if (!$id) die("Error: No se especificó el ID del empleado");

try {
    // Conectar a BBDD
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si se envía POST, validar y actualizar
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST['nombre'];
        $puesto = $_POST['puesto'];
        $salario = $_POST['salario'];

        // UPDATE usando prepared statement
        $sql = "UPDATE empleados 
                SET nombre = :nombre, puesto = :puesto, salario = :salario 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':puesto' => $puesto,
            ':salario' => $salario,
            ':id' => $id
        ]);

        // Indicar éxito (simple)
        echo "<p style='color: green;'>Empleado actualizado correctamente</p>";
    }

    // Obtener datos actuales para prefijar el formulario
    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$empleado) die("Error: Empleado no encontrado");

} catch (PDOException $e) {
    // Error crítico
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
</head>
<body>
    <h1>Editar Empleado</h1>
    <form method="post">
        <p>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>" required>
        </p>
        <p>
            <label>Puesto:</label><br>
            <input type="text" name="puesto" value="<?= htmlspecialchars($empleado['puesto']) ?>" required>
        </p>
        <p>
            <label>Salario:</label><br>
            <input type="number" name="salario" step="0.01" value="<?= htmlspecialchars($empleado['salario']) ?>" required>
        </p>
        <button type="submit">Actualizar Empleado</button>
    </form>
    <br>
    <a href="lista.php">← Volver a la lista</a>
</body>
</html>