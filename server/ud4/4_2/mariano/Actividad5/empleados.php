<?php
require_once 'config.php'; 

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("ID de empleado no especificado o inválido.");
}

$id = (int) $_GET['id'];

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        $puesto  = isset($_POST['puesto'])  ? trim($_POST['puesto'])  : '';
        $salario = isset($_POST['salario']) ? trim($_POST['salario']) : '';

        if ($nombre === '' || $puesto === '' || $salario === '') {
            throw new Exception("Todos los campos son obligatorios.");
        }

        $sql = "UPDATE empleados SET nombre = ?, puesto = ?, salario = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $puesto, $salario, $id]);

        header("Location: empleados.php?id=$id&updated=1");
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, nombre, puesto, salario FROM empleados WHERE id = ?");
    $stmt->execute([$id]);
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$empleado) {

        throw new Exception("Empleado no encontrado.");
    }

} catch (PDOException $e) {
    
    die("Error en la base de datos: " . htmlspecialchars($e->getMessage()));
} catch (Exception $e) {
    
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Empleado</title>
</head>
<body>

<h2 style="text-align:center;">Editar Empleado</h2>

<form method="POST" action="">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>" required>

    <label>Puesto:</label>
    <input type="text" name="puesto" value="<?= htmlspecialchars($empleado['puesto']) ?>" required>

    <label>Salario:</label>
    <input type="number" name="salario" step="0.01" value="<?= htmlspecialchars($empleado['salario']) ?>" required>

    <input type="submit" value="Aceptar">
    <a href="lista.php">Volver a la lista</a>
</form>

</body>
</html>
