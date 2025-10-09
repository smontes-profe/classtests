<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte 2</title>
    <style>
        td, th { 
            border: 1px solid #333; 
            padding: 8px;}
    </style>
</head>
<body>
<?php
// Personal data variables
$name = 'Mauri';
$lastname = 'Pacheco';
$lastname2 = 'Parra';
$email = 'mauri1658jr@alu,mnos.ilerna.com';
$birthdate = 2003;
$mobile = '635864520';

// Show in a table
?>
<table>
    <tr><td>Nombre</td><td><?php echo $name; ?></td></tr>
    <tr><td>Primer apellido</td><td><?php echo $lastname; ?></td></tr>
    <tr><td>Segundo apellido</td><td><?php echo $lastname2; ?></td></tr>
    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
    <tr><td>Año de nacimiento</td><td><?php echo $birtdate; ?></td></tr>
    <tr><td>Móvil</td><td><?php echo $mobile; ?></td></tr>
</table>

</body>
</html>
