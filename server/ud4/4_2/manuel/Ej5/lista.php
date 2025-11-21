<?php
require_once 'conexion.php';
$pdo = getPDO();

try {
    $stmt = $pdo->query("SELECT id, nombre, puesto, salario FROM empleados ORDER BY id");
    $empleados = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista empleados - CRUD</title>
<script>
function confirmarEliminar(form) {
    if (confirm('¿Seguro que deseas eliminar al empleado?')) {
        form.submit();
    }
    return false;
}
</script>
</head>
<body>
    <h1>Empleados</h1>
    <p><a href="eempleado.php">Crear nuevo empleado</a></p>
    <?php if (empty($empleados)): ?>
        <p>No hay empleados.</p>
    <?php else: ?>
        <table border="1" cellpadding="6">
            <thead><tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th><th>Editar</th><th>Eliminar</th></tr></thead>
            <tbody>
                <?php foreach ($empleados as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['id']) ?></td>
                    <td><?= htmlspecialchars($emp['nombre']) ?></td>
                    <td><?= htmlspecialchars($emp['puesto']) ?></td>
                    <td><?= htmlspecialchars(number_format($emp['salario'],2,',','.')) ?> €</td>
                    <td><a href="eempleado.php?id=<?= urlencode($emp['id']) ?>">Editar</a></td>
                    <td>
                        <form method="post" action="eliminar_empleado.php" onsubmit="return confirmarEliminar(this);">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($emp['id']) ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>