
// Actividad 3
<?php
require_once __DIR__ . '/config.php';

$resultado = [];
$busqueda = $_GET['nombre'] ?? '';

if ($busqueda !== '') {

  try {
    $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $sql = "SELECT id, nombre, puesto, salario FROM empleados WHERE nombre LIKE :nombre";
    $stmt = $pdo->prepare($sql);
    $like = "%{$busqueda}%";
    $stmt->bindParam(':nombre', $like, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
  } catch (PDOException $e) {
    http_response_code(500);
    die("Error: " . htmlspecialchars($e->getMessage()));
  }
}

?>



<!doctype html>
<html lang="es">


<head>

  <meta charset="utf-8">
  <title>Buscar empleado</title>

  <style>
    label { display:block; margin:.5rem 0 .25rem; }
    input[type=text] { width: 200px; padding:.4rem; height: 21px}
    table { border-collapse: collapse; width: 700px; max-width: 100%; margin-top:1rem;}
    th, td { border: 1px solid #ccc; padding: .5rem; text-align: center; }
    th { background: purple; }
  </style>

</head>

<body>
  <h1>Buscar empleado</h1>

  <form method="get">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($busqueda) ?>">
    <button type="submit">Buscar</button>
  </form>

  <?php if ($busqueda !== ''): ?>

    <?php if (!$resultado): ?>
      <p>No se encontraron empleados que coincidan con "<?= htmlspecialchars($busqueda) ?>"</p>
    <?php else: ?>

    <table>
      <thead>
        <tr>
          <th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($resultado as $e): ?>
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

<?php endif; ?>
</body>
</html>
