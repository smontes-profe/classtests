<?php
require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM empleados");
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head><title>Listado de Empleados</title></head>
<body>
<h2>Empleados</h2>
<?php if (count($empleados) > 0): ?>
    
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
    <?php foreach ($empleados as $emp): ?>
    <tr>
        <td><?= $emp['id'] ?></td>
        <td><?= $emp['nombre'] ?></td>
        <td><?= $emp['puesto'] ?></td>
        <td><?= $emp['salario'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>No hay empleados registrados.</p>
<?php endif; ?>
</body>
</html>