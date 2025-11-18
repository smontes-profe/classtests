<?php
//http://localhost/2do_servidor/ud4/actividad3/buscar_empleado.php

require_once __DIR__ . '/../actividad1/conexion.php';
$results = [];
$input_nombre = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_nombre = trim($_POST['nombre'] ?? '');

    if ($input_nombre !== '') {
        try {

            $stmt = $pdo->prepare("SELECT * FROM  empleados WHERE nombre LIKE :nombre");
            $like= "%$input_nombre%";
            $stmt->bindParam(':nombre', $like, PDO::PARAM_STR);
            $stmt->execute();

            $results = $stmt->fetchAll();
        } catch (PDOException $e) {

            die("Error: " . htmlspecialchars($e->getMessage()));
        }
    }
}
?>


<!doctype html>
<html><head><meta charset="utf-8"><title>Buscar empleado</title></head><body>
<h1>Buscar empleado</h1>

<form method="post" action="">

  <input type="text" name="nombre" value="<?=htmlspecialchars($input_nombre)?>" placeholder="Nombre">
  <button type="submit">Buscar</button>

</form>

<?php if ($_SERVER['REQUEST_METHOD']==='POST'): ?>
  <?php if ($results): ?>
    <table border="1" cellpadding="6">
      <thead><tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr></thead>
      <tbody>
      <?php foreach($results as $r): ?>

        <tr>
          <td><?=htmlspecialchars($r['id'])?></td>
          <td><?=htmlspecialchars($r['nombre'])?></td>
          <td><?=htmlspecialchars($r['puesto'])?></td>
          <td><?=htmlspecialchars($r['salario'])?></td>
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>

  <?php else: ?>
    <p>No encontramos el empleado</p>
  <?php endif;?>

<?php endif; ?>
</body></html>
