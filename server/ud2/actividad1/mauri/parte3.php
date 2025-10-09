<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte 3</title>
    <style>
        td, th { 
            border: 1px solid #333;
            padding: 8px; 
        }
    </style>
</head>
<body>
<?php
// Collect data sent via GET and display them in a table
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
$lastname = isset($_GET['lastname']) ? htmlspecialchars($_GET['lastname']) : '';
$lastname2 = isset($_GET['lastname2']) ? htmlspecialchars($_GET['lastname2']) : '';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$birthdate = isset($_GET['birthdate']) ? htmlspecialchars($_GET['birthdate']) : '';
$mobile = isset($_GET['mobile']) ? htmlspecialchars($_GET['mobile']) : '';

?>
<table>
    <tr><td>Nombre</td><td><?php echo $name; ?></td></tr>
    <tr><td>Primer apellido</td><td><?php echo $lastname; ?></td></tr>
    <tr><td>Segundo apellido</td><td><?php echo $lastname2; ?></td></tr>
    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
    <tr><td>Año de nacimiento</td><td><?php echo $birthdate; ?></td></tr>
    <tr><td>Móvil</td><td><?php echo $mobile; ?></td></tr>
</table>
</body>
</html>