<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function e($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

$nombre          = $_GET['nombre']    ?? '';
$apellidoPrimero = $_GET['apellido1'] ?? '';
$apellidoSegundo = $_GET['apellido2'] ?? '';
$email           = $_GET['email']     ?? '';
$anoNacimiento   = $_GET['fecha']     ?? '';
$telefonoMovil   = $_GET['movil']     ?? '';

$hayDatos = !empty($_GET);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parte 3 · Resultados</title>
</head>
<body>
  <header>
    <h1>Tabla de resultados</h1>
  </header>

  <main>
    <?php if(!$hayDatos): ?>
      <p>No has enviado datos todavía.</p>
      <p><a href="parte3.html">Volver al formulario</a></p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Campo</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Nombre</td><td><?= e($nombre) ?></td></tr>
          <tr><td>Primer apellido</td><td><?= e($apellidoPrimero) ?></td></tr>
          <tr><td>Segundo apellido</td><td><?= e($apellidoSegundo) ?></td></tr>
          <tr><td>Correo</td><td><?= e($email) ?></td></tr>
          <tr><td>Fecha de nacimiento</td><td><?= e($anoNacimiento) ?></td></tr>
          <tr><td>Teléfono</td><td><?= e($telefonoMovil) ?></td></tr>
        </tbody>
      </table>

    <?php endif; ?>
  </main>
</body>
</html>
