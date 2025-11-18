<!--http://localhost/2do_servidor/ud4/actividad2/listar_empleados.php-->
<?php
require_once __DIR__ . '/../actividad1/conexion.php';

$stmt = $pdo->query("SELECT * FROM empleados");
$empleados = $stmt->fetchAll();
?>


<!doctype html>
<html>
<head><meta charset="utf-8"><title>Empleados</title></head>
<body>

<h1>Empleados</h1>

<?php if ($empleados): ?>
<table border="1px solid black" cellpadding="6">

  <thead>
    <tr>
        <th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($empleados as $emp): ?>

    <tr>
      <td><?= htmlspecialchars($emp['id'])?></td>
      <td><?=htmlspecialchars($emp['nombre']) ?></td>
      <td><?=htmlspecialchars($emp['puesto']) ?></td>
      <td><?=htmlspecialchars($emp['salario'])?></td>
    </tr>

  <?php endforeach; ?>
  </tbody>
</table>

<?php else: ?>
<p>No hay registros.</p>
<?php endif; ?>

</body>
</html>
