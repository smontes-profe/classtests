
// Actividad 5
<?php
require_once __DIR__ . '/config.php';

try {
  $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]);
  $empleados = $pdo->query("SELECT id, nombre, puesto, salario FROM empleados ORDER BY id")->fetchAll();
} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Lista empleados</title>

  <style>
    table { border-collapse: collapse; width: 800px; max-width: 100%; }
    th, td { border: 1px solid #ccc; padding: .5rem; }
    th { background: purple; }
    a.button, button { padding:.3rem .6rem; text-decoration:none; border:1px solid #888; border-radius:4px; background:white; }
  </style>

  <script>
    function confirmarEliminar(id) {
      if (confirm('¿Quieres eliminar el empleado #' + id + '?')) {
        window.location.href = 'acciones/eliminar_empleado.php?id=' + encodeURIComponent(id);
      }
    }
  </script>

</head>

<body>
  <h1>Empleados</h1>

  <p><a class="button" style="background-color: purple; color: black" href="eempleado.php">Nuevo empleado</a></p>

  <table>
    <thead>
      <tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th><th>Editar</th><th>Eliminar</th></tr>
    </thead>
    <tbody>
    <?php foreach ($empleados as $e): ?>
      <tr>
        <td><?= htmlspecialchars($e['id']) ?></td>
        <td><?= htmlspecialchars($e['nombre']) ?></td>
        <td><?= htmlspecialchars($e['puesto']) ?></td>
        <td><?= number_format((float)$e['salario'], 2) ?> €</td>
        <td><a class="button" style="height: 20px; color: purple" href="eempleado.php?id=<?= urlencode($e['id']) ?>">Editar</a></td>
        <td><button onclick="confirmarEliminar(<?= htmlspecialchars($e['id']) ?>)">Eliminar</button></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>


