
// Actividad 5
<?php

require_once __DIR__ . '/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$errores = [];
$exito = false;
$datos = ['nombre' => '', 'puesto' => '', 'salario' => ''];

try {

  $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
    $datos['nombre'] = trim($_POST['nombre'] ?? '');
    $datos['puesto'] = trim($_POST['puesto'] ?? '');
    $datos['salario'] = trim($_POST['salario'] ?? '');

    if ($datos['nombre'] === '') $errores[] = 'Nombre obligatorio';
    if ($datos['salario'] !== '' && !is_numeric($datos['salario'])) $errores[] = 'El salario tiene que ser numérico';

    if (!$errores) {
      if ($id) {
        $stmt = $pdo->prepare("UPDATE empleados SET nombre=:n, puesto=:p, salario=:s WHERE id=:id");
        $stmt->execute([':n'=>$datos['nombre'], ':p'=>$datos['puesto']?:null, ':s'=>$datos['salario']?:null, ':id'=>$id]);
        $exito = true;
      } else {
        $stmt = $pdo->prepare("INSERT INTO empleados (nombre, puesto, salario) VALUES (:n, :p, :s)");
        $stmt->execute([':n'=>$datos['nombre'], ':p'=>$datos['puesto']?:null, ':s'=>$datos['salario']?:null]);
        $id = (int)$pdo->lastInsertId();
        $exito = true;
      }
    }
  }

  if ($id && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    $stmt = $pdo->prepare("SELECT id, nombre, puesto, salario FROM empleados WHERE id=:id");
    $stmt->execute([':id' => $id]);
    $datos = $stmt->fetch() ?: $datos;
  }
} catch (PDOException $e) {
  die("Error: " . htmlspecialchars($e->getMessage()));
}
?>


<!doctype html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <title><?= $id ? 'Editar empleado' : 'Nuevo empleado' ?></title>

  <style>
    label { display:block; margin:.5rem 0 .25rem; }
    input[type=text], input[type=number]{ width: 250px; padding:.4rem; height:22px}
    .error { color:red; }
    .ok { color:green; }
  </style>

</head>

<body>
  <h1><?= $id ? 'Editar empleado' : 'Nuevo empleado' ?></h1>

  <?php if ($exito): ?>
    <p class="ok">Datos guardados correctamente</p>
  <?php endif; ?>

  <?php if ($errores): ?>
    <ul class="error"><?php foreach ($errores as $er): ?><li><?= htmlspecialchars($er) ?></li><?php endforeach; ?></ul>
  <?php endif; ?>

  <form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id ?? '') ?>">
    <label>Nombre</label>
    <input type="text" name="nombre" placeholder="Nombre" required value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>">
    <label>Puesto</label>
    <input type="text" name="puesto" placeholder="Puesto" value="<?= htmlspecialchars($datos['puesto'] ?? '') ?>">
    <label>Salario</label>
    <input type="number" step="0.01" name="salario" placeholder="Salario" value="<?= htmlspecialchars($datos['salario'] ?? '') ?>">
    <button type="submit" style="background-color: purple">Aceptar</button>
    <a href="lista.php">Volver a la lista</a>
  </form>
</body>
</html>


