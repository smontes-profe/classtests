<!--
3. parte3.html y part3.php:
Es el mismo ejercicio anterior, pero separando la lógica. 
En el html crearemos el formulario para introducir los datos, 
los enviamos por GET y en el PHP los recogemos y generamos la tabla con los datos recibidos 
(intentad aprovechad al máximo la parte de html y css del ejercicio anterior para ganar tiempo).  
//2 PUNTOS.

-->

<?php


$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

$apellido1 = isset($_GET['apellido1']) ? $_GET['apellido1'] : '';

$apellido2 = isset($_GET['apellido2']) ? $_GET['apellido2'] : '';

$email = isset($_GET['email']) ? $_GET['email'] : '';

$anyo = isset($_GET['anyo']) ? $_GET['anyo'] : '';

$movil = isset($_GET['movil']) ? $_GET['movil'] : '';

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Datos Recibidos</title>
  </head>
<body>
  <div class="container">
    <h2>Datos Recibidos</h2>

    <?php ?>
      <table>

        <tr>
          <th>Campo</th>
          <th>Valor</th>
        </tr>

        <tr><td>Nombre</td><td><?php echo ($nombre); ?></td></tr>

        <tr><td>Primer Apellido</td><td><?php echo ($apellido1); ?></td></tr>

        <tr><td>Segundo Apellido</td><td><?php echo ($apellido2); ?></td></tr>

        <tr><td>Email</td><td><?php echo ($email); ?></td></tr>

        <tr><td>Año de Nacimiento</td><td><?php echo ($anyo); ?></td></tr>

        <tr><td>Móvil</td><td><?php echo ($movil); ?></td></tr>

      </table>

    <?php ?>
  </div>
</body>
</html>