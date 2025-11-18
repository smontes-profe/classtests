<?php
require_once __DIR__ . '/../actividad1/conexion.php';

$st = $pdo->query("SELECT id, nombre, salario FROM empleados");
?>
<h1>Listado empleados</h1>
<ul>
<?php foreach($st as $row): ?>
<li>
    <?= htmlspecialchars($row['nombre']) ?> – <?= $row['salario'] ?> €
    <a href="eempleado.php?id=<?= $row['id'] ?>">editar</a>
    <a href="eliminar_empleado.php?id=<?= $row['id'] ?>">eliminar</a>
</li>
<?php endforeach; ?>
</ul>
