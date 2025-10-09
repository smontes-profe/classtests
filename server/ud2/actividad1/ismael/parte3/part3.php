<!-- 3. parte3.html y part3.php: Es el mismo ejercicio anterior, pero separando la lógica. En el html crearemos el formulario para introducir los datos, los enviamos por GET y en el PHP los recogemos y generamos la tabla con los datos recibidos (intentad aprovechad al máximo la parte de html y css del ejercicio anterior para ganar tiempo).  //2 PUNTOS.

 -->



<?php

$nombre = $_GET['nombre'];
$primerApellido = $_GET['primerApellido'];
$segundoApellido = $_GET['segundoApellido'];
$email = $_GET['email'];
$anioNacimiento = $_GET['anioNacimiento'];
$movil = $_GET['movil'];

// Comprobar si el formulario se envió.
$enviado = isset($_GET['nombre']) || isset($_GET['primerApellido']) || isset($_GET['segundoApellido'])
           || isset($_GET['email']) || isset($_GET['anioNacimiento']) || isset($_GET['movil']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Parte 3 - Tabla generada</title>
</head>
<body>
  <h2>Tabla con los datos enviados</h2>

  <?php if ($enviado): ?>
    <table border="1" cellpadding="8" cellspacing="0">
      <tr>
        <th>Campo</th>
        <th>Valor</th>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><?php echo($nombre); ?></td>
      </tr>
      <tr>
        <td>Primer Apellido</td>
        <td><?php echo($primerApellido); ?></td>
      </tr>
      <tr>
        <td>Segundo Apellido</td>
        <td><?php echo($segundoApellido); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo($email); ?></td>
      </tr>
      <tr>
        <td>Año de Nacimiento</td>
        <td><?php echo($anioNacimiento); ?></td>
      </tr>
      <tr>
        <td>Móvil</td>
        <td><?php echo($movil); ?></td>
      </tr>
    </table>

    <p><a href="parte3.html">Volver al formulario</a></p>

  <?php else: ?>
    <p style="color:red;">No se han recibido datos. Por favor, completa el formulario.</p>
    <p><a href="parte3.html">Ir al formulario</a></p>
  <?php endif; ?>
</body>
</html>
