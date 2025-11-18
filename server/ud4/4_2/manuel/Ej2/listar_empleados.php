<?php
require_once 'conexion.php';
$pdo = getPDO();

try {
    $sql = "SELECT id, nombre, puesto, salario FROM empleados ORDER BY id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $empleados = $stmt->fetchAll(); // FETCH_ASSOC por defecto en conexion.php
} catch (PDOException $e) {
    die("Error al obtener empleados: " . htmlspecialchars($e->getMessage()));
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de empleados</title>
    <style>table{border-collapse:collapse;width:100%}td,th{border:1px solid #ccc;padding:6px}</style>
</head>
<body>
    <h1>Empleados</h1>
    <?php if (empty($empleados)): ?>
        <p>No hay registros de empleados.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $e): ?>
                    <tr>
                        <td><?= htmlspecialchars($e['id']) ?></td>
                        <td><?= htmlspecialchars($e['nombre']) ?></td>
                        <td><?= htmlspecialchars($e['puesto']) ?></td>
                        <td><?= htmlspecialchars(number_format($e['salario'], 2, ',', '.')) ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>