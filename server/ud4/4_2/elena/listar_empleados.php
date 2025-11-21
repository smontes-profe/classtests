
// Actividad 2
<?php
require_once __DIR__ . '/config.php';

try {
  $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
 ]);

  $stmt = $pdo->query("SELECT id, nombre, puesto, salario FROM empleados ORDER BY id");
  $empleados = $stmt->fetchAll();

} catch (PDOException $e) {
  http_response_code(500);
  die("Error: " . htmlspecialchars($e->getMessage()));
}
?>



<!doctype html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <title>Listado de empleados</title>
  <style>
    table { border-collapse: collapse; width: 700px; max-width: 100%; }
    th, td { border: 1px solid #ccc; padding: .5rem; text-align: center; }
    th { background: purple; }
  </style>
  
</head>

<body>

  <h1>Empleados</h1>

  <?php if (!$empleados): ?>
    <p>Error</p>

  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($empleados as $e): ?>
          <tr>
            <td><?= htmlspecialchars($e['id']) ?></td>
            <td><?= htmlspecialchars($e['nombre']) ?></td>
            <td><?= htmlspecialchars($e['puesto']) ?></td>
            <td><?= number_format((float)$e['salario'], 2) ?> €</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>


