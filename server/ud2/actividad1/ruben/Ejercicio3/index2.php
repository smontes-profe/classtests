<?php
/*3. parte3.html y part3.php: Es el mismo ejercicio 
anterior, pero separando la lógica. En el html 
crearemos el formulario para introducir los datos, 
los enviamos por GET y en el PHP los recogemos y 
generamos la tabla con los datos recibidos (intentad 
aprovechad al máximo la parte de html y css del 
ejercicio anterior para ganar tiempo). */

$name = isset($_GET['name']) ? $_GET['name'] :"";
$surname1 = isset($_GET['surname1']) ? $_GET['surname1'] : "";
$surname2 = isset($_GET["surname2"]) ? $_GET['surname2'] : "";
$email = isset($_GET["email"]) ? $_GET['email'] : "";
$birthYear = isset($_GET["birthYear"]) ? $_GET['birthYear'] : "";
$mobile = isset($_GET["mobile"]) ? $_GET['mobile'] : "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Email</th>
            <th>Año de Nacimiento</th>
            <th>Móvil</th>
        </tr>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $surname1; ?></td>
            <td><?php echo $surname2; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $birthYear; ?></td>
            <td><?php echo $mobile; ?></td>
        </tr>
    </table>
</body>
</html>