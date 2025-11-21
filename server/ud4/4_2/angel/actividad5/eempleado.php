<?php
require_once "../actividad1/config.php";

try {
    // Conexión con PDO
    $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar si llega ID válido por GET
if (!isset($_GET['id'])) {
    die("Error: Falta el ID del empleado.");
}

$id = (int) $_GET['id'];
$mensaje = "";

// Si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $puesto = trim($_POST["puesto"]);
    $salario = trim($_POST["salario"]);

    try {
        // Actualizar datos del empleado con consulta preparada
        $sql = "UPDATE empleados SET nombre = :nombre, puesto = :puesto, salario = :salario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":puesto", $puesto, PDO::PARAM_STR);
        $stmt->bindParam(":salario", $salario);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $mensaje = "✅ Datos actualizados correctamente.";
    } catch (PDOException $e) {
        $mensaje = "Error al actualizar: " . $e->getMessage();
    }
}

// Consultar los datos actuales del empleado
try {
    $sql = "SELECT * FROM empleados WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$empleado) {
        die("Empleado no encontrado.");
    }
} catch (PDOException $e) {
    die("Error al cargar los datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
</head>

<body>

    <h2>Editar Empleado</h2>

    <form method="post" action="">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>"><br><br>

        <label>Puesto:</label><br>
        <input type="text" name="puesto" value="<?= htmlspecialchars($empleado['puesto']) ?>"><br><br>

        <label>Salario:</label><br>
        <input type="number" step="0.01" name="salario" value="<?= htmlspecialchars($empleado['salario']) ?>"><br><br>

        <input type="submit" value="Aceptar">
    </form>

    <p><?= $mensaje ?></p>

    <p><a href="lista.php">Volver al listado</a></p>

</body>

</html>