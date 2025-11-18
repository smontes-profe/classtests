<?php
require_once 'config.php';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$empleados = $pdo->query("SELECT * FROM empleados")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>Lista de empleados</title></head>
<body>
<h2>Empleados</h2>
<table border="1">
<tr><th>Nombre</th><th>Puesto</th><th>Salario</th><th>Editar</th><th>Eliminar</th></tr>
<?php foreach ($empleados as $emp): ?>
<tr>
    <td><?= htmlspecialchars($emp['nombre']) ?></td>
    <td><?= htmlspecialchars($emp['puesto']) ?></td>
    <td><?= htmlspecialchars($emp['salario']) ?></td>
    <td><a href="eempleado.php?id=<?= $emp['id'] ?>">Editar</a></td>
    <td><a href="eliminar.php?id=<?= $emp['id'] ?>" onclick="return confirm('¿Eliminar este empleado?')">Eliminar</a></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>