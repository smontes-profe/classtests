<?php
/*
 parte3.html y part3.php: Es el mismo ejercicio anterior, 
 pero separando la lógica. En el html crearemos el formulario para introducir los datos, 
 los enviamos por GET y en el PHP los recogemos y generamos la tabla con los datos recibidos 
 (intentad aprovechad 
 al máximo la parte de html y css del ejercicio anterior para ganar tiempo).  //2 PUNTOS.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method=get action="";>
    nombre: <input type="text" name="nombre"><br>
    primer apellido: <input type="text" name="apellido1"><br>
    segundo apellido: <input type="text" name="apellido2"><br>
    email: <input type="text" name="email"><br>
    año: <input type="num" name="año"><br>
    movil: <input type="text" name="movil"><br>
    <input type="submit" value="enviar">
</form>
<?php
$nombre = $_GET['nombre'];
$apellido1 = $_GET['apellido1'];
$apellido2 = $_GET['apellido2'];
$email = $_GET['email'];
$año = $_GET['año'];
$movil = $_GET['movil'];


echo "<table border ='1'>";
echo "<tr><th>Nombre</$nombre</td></tr>";
echo "<tr><th>Apellido1</$apellido1</td></tr>";
echo "<tr><th>Apellido2</$apellido2</td></tr>";
echo "<tr><th>email</$email</td></tr>";
echo "<tr><th>año</$año</td></tr>";
echo "<tr><th>movil</$movil</td></tr>";
echo "</table>";


?>

</body>
</html>