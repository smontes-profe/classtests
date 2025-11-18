<?php

require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $empleados = $pdo->query("SELECT * FROM empleados")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<table border="1" cellpadding="8">
<tr><th>Nombre</th><th>Puesto</th><th>Salario</th><th>Acciones</th></tr>
<?php foreach ($empleados as $emp): ?>
<tr>
    <td><?= htmlspecialchars($emp['nombre']) ?></td>
    <td><?= htmlspecialchars($emp['puesto']) ?></td>
    <td><?= $emp['salario'] ?></td>
    <td>
        <a href="eempleado.php?id=<?= $emp['id'] ?>">Editar</a> |
        <a href="eliminar.php?id=<?= $emp['id'] ?>" onclick="return confirm('¿Eliminar empleado?')">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
